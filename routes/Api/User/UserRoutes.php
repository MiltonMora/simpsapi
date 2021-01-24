<?php

use Illuminate\Http\Request;
use App\Application\User\Command\UserCommand;
use App\Application\User\UserHandler;

Route::middleware('auth:api')->post('/new/user', function (Request $request) {
    $handle = new UserHandler();
    return $handle->handle(
        new UserCommand($request->name, $request->email, $request->password)
    );
});
