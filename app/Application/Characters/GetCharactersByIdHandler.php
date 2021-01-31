<?php


namespace App\Application\Characters;

use App\Application\Characters\Command\GetCharactersByIdCommand;
use App\Http\Controllers\CharacterController;

class GetCharactersByIdHandler
{

    private $characterController;

    public function __construct()
    {
        $this->characterController = new CharacterController();
    }

    public function handle(GetCharactersByIdCommand $command) {
        return $this->characterController->show($command->getId());
    }

}
