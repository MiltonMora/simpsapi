<?php

namespace App\Application\User;

use App\Application\User\Command\UserCommand;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;

class UserHandler {

    private $UserController;

    public function __construct(UserController $UserController)
    {
        $this->UserController = $UserController;
    }

    public function handle (UserCommand $command) {
        $validator = Validator::make(['name' => $command->getName(), 'email' => $command->getEmail(), 'password'=> $command->getPassword()], [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 404
            ]);
        }

        return response()->json(
            $this->UserController->create($command->getName(), $command->getEmail(), $command->getPassword())
        );
    }
}
