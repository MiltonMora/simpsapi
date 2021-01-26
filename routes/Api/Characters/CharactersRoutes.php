<?php

use Illuminate\Http\Request;
use App\Application\Characters\Command\CharacterCommand;
use App\Application\Characters\CharacterHandler;

Route::middleware('auth:api')->post('/character/new', function (Request $request) {
    $handle = new CharacterHandler();
    return $handle->handle(
        new CharacterCommand(
            $request->name,
            $request->image,
            $request->age,
            $request->occupation,
            $request->status,
            $request->type,
            $request->origin
        )
    );
});
