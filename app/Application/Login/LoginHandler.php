<?php

namespace App\Application\login;

use App\Application\Login\Command\LoginCommand;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Validator;

class LoginHandler {

    private $loginController;

    public function __construct()
    {
        $this->loginController = new LoginController();
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

        return $this->loginController->Login(
            $command->getEmail(),
            $command->getPassword()
        );
    }
}
