<?php

namespace App\Application\login;

use App\Application\Login\Command\LoginCommand;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Validator;

class LoginHandler {

    private $loginController;

    public function __construct(LoginController $loginController)
    {
        $this->loginController = $loginController;
    }

    public function handle(LoginCommand $command) {


        $validator = Validator::make(['email' => $command->getEmail(), 'password'=> $command->getPassword()], [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 404
            ]);
        }

        return response()->json([
            $this->loginController->Login(
                $command->getEmail(),
                $command->getPassword()
            )
        ]);
    }
}
