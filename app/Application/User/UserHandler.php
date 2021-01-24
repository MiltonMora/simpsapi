<?php

namespace App\Application\User;

use App\Application\User\Command\UserCommand;

class UserHandler {

    public function handle (UserCommand $command) {
        return response()->json(["hola" => "mundo"]);
    }
}
