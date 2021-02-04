<?php


namespace App\Application\Characters;

use App\Application\Characters\Command\GetCharactersByIdCommand;
use App\Http\Controllers\CharacterController;

class GetCharactersByIdHandler
{

    private $characterController;

    public function __construct(CharacterController $characterController)
    {
        $this->characterController = $characterController;
    }

    public function handle(GetCharactersByIdCommand $command) {
        return response()->json($this->characterController->show($command->getId()));
    }

}
