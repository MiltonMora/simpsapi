<?php

namespace App\Application\Characters;

use App\Application\Characters\Command\CharacterCommand;
use App\Http\Controllers\CharacterController;

class CharacterHandler {

    private $characterController;

    public function __construct()
    {
        $this->characterController = new CharacterController();
    }

    public function handle(CharacterCommand $command){
        return $this->characterController->create(
            $command->getName(),
            $command->getImage(),
            $command->getAge(),
            $command->getOccupation(),
            $command->getStatus(),
            $command->getType(),
            $command->getOrigin()
        );
    }
    /*
 * convertir imagen a base 64
Route::post('/image', function (Request $request) {
    $fileName = $request->file('filename');
    $img = file_get_contents($fileName->getRealPath());
    return base64_encode($img);
});*/

}
