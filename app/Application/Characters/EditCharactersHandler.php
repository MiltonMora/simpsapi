<?php


namespace App\Application\Characters;

use App\Application\Characters\Command\CharacterCommand;
use App\Http\Controllers\CharacterController;


class EditCharactersHandler
{
    private $characterController;

    public function __construct()
    {
        $this->characterController = new CharacterController();
    }

    public function handle(CharacterCommand $command){

        $image = $command->getImage();
        if($command->getImage() ){
            try {
                $img = file_get_contents($command->getImage());
                $image = base64_encode($img);
            }
            catch (\Exception $e) {
                return response()->json([
                    'data' => ['error' => $e, 'message' => 'error uploading image'],
                    'status' => 404
                ]);
            }
        }

        return $this->characterController->update(
            $command->getId(),
            $command->getName(),
            $image,
            $command->getBirth(),
            $command->getOccupation(),
            $command->getStatus(),
            $command->getType(),
            $command->getOrigin()
        );
    }

}
