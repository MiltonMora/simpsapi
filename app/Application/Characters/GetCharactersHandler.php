<?php


namespace App\Application\Characters;

use App\Application\Characters\Command\GetCharactersCommand;
use App\Http\Controllers\CharacterController;

class GetCharactersHandler
{
    private $characterController;

    public function __construct()
    {
        $this->characterController = new CharacterController();
    }

    public function handle(GetCharactersCommand $command){
        return $this->characterController->index();
    }


}
