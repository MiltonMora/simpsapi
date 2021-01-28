<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\Characters\Command\CharacterCommand;
use App\Application\Characters\CharacterHandler;
use App\Application\Characters\Command\GetCharactersCommand;
use App\Application\Characters\GetCharactersHandler;

Route::middleware('auth:api')->post('/character/new', function (Request $request) {
    $handle = new CharacterHandler();
    return $handle->handle(
        new CharacterCommand(
            $request->name,
            $request->image,
            $request->birth,
            $request->occupation,
            $request->status,
            $request->type,
            $request->origin
        )
    );
});

Route::middleware('auth:api')->get('/characters', function (Request $request) {
    $handle = new GetCharactersHandler();
    return $handle->handle(
        new GetCharactersCommand()
    );
});
