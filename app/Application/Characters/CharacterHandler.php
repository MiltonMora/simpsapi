<?php

namespace App\Application\Characters;

use App\Application\Characters\Command\CharacterCommand;
use App\Http\Controllers\CharacterController;
use Illuminate\Support\Facades\Validator;

class CharacterHandler {

    private $characterController;

    public function __construct()
    {
        $this->characterController = new CharacterController();
    }

    public function handle(CharacterCommand $command){

        $validator = Validator::make(['name' => $command->getName(), 'image' => $command->getImage()], [
            'name' => 'required',
            'image' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 404
            ]);
        }

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

        return $this->characterController->create(
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
