<?php


namespace App\Application\Characters;

use App\Application\Characters\Command\GetCharactersCommand;
use App\Http\Controllers\CharacterController;

class GetCharactersHandler
{
    private $characterController;

    public function __construct(CharacterController $characterController)
    {
        $this->characterController = $characterController;
    }

    public function handle(GetCharactersCommand $command){
        return response()->json($this->characterController->index());
    }


}
