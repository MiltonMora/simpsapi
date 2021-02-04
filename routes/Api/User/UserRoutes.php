<?php

use Illuminate\Http\Request;
use App\Application\User\Command\UserCommand;
use App\Application\User\UserHandler;
use App\Http\Controllers\UserController;

Route::middleware(['auth:api', 'role:superadministrator|administrator'])->post('/new/user', function (Request $request) {
    $handle = new UserHandler(new UserController);
    return $handle->handle(
        new UserCommand($request->name, $request->email, $request->password)
    );
});
