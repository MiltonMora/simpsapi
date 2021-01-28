<?php

namespace App\Application\Characters\Command;

use Illuminate\Support\Facades\File;

class CharacterCommand {

    private $name;
    private $image;
    private $birth;
    private $occupation;
    private $status;
    private $type;
    private $origin;

    public function __construct(
        $name,
        $image,
        $birth,
        $occupation,
        $status,
        $type,
        $origin
    )
    {
        $this->name = $name;
        $this->image = $image;
        $this->birth = $birth;
        $this->occupation = $occupation;
        $this->status = $status;
        $this->type = $type;
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }


}
