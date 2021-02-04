<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\Characters\Command\CharacterCommand;
use App\Application\Characters\CharacterHandler;
use App\Application\Characters\Command\GetCharactersCommand;
use App\Application\Characters\GetCharactersHandler;
use App\Application\Characters\Command\GetCharactersByIdCommand;
use App\Application\Characters\GetCharactersByIdHandler;
use App\Application\Characters\EditCharactersHandler;
use App\Http\Controllers\CharacterController;

Route::middleware(['auth:api', 'role:superadministrator|administrator'])->post('/character/new', function (Request $request) {
    $handle = new CharacterHandler(new CharacterController);
    return $handle->handle(
        new CharacterCommand(
            $request->name,
            $request->image,
            $request->birth,
            $request->occupation,
            $request->status,
            $request->type,
            $request->origin,
            ''
        )
    );
});

Route::middleware('auth:api')->get('/characters', function (Request $request) {
    $handle = new GetCharactersHandler(new CharacterController);
    return $handle->handle(
        new GetCharactersCommand()
    );
});

Route::middleware('auth:api')->get('/characters/{id}', function (Request $request, $id) {
    $handle = new GetCharactersByIdHandler(new CharacterController);
    return $handle->handle(
        new GetCharactersByIdCommand($id)
    );
});

Route::middleware(['auth:api', 'role:superadministrator|administrator'])->put('/character/edit', function (Request $request) {
    $handle = new EditCharactersHandler(new CharacterController);

    return $handle->handle(
        new CharacterCommand(
            $request->name,
            $request->image,
            $request->birth,
            $request->occupation,
            $request->status,
            $request->type,
            $request->origin,
            $request->id
        )
    );
});
