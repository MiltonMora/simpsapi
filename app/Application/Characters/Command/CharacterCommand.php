<?php

namespace App\Application\Characters\Command;

use http\Url;
use Illuminate\Support\Facades\File;

class CharacterCommand {

    /**
     * @var integer|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $image;

    /**
     * @var integer|null
     */
    private $birth;

    /**
     * @var string|null
     */
    private $occupation;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var integer|null
     */
    private $origin;

    public function __construct(
        $name,
        $image,
        $birth,
        $occupation,
        $status,
        $type,
        $origin,
        $id
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->birth = $birth;
        $this->occupation = $occupation;
        $this->status = $status;
        $this->type = $type;
        $this->origin = $origin;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return int|null
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @return string|null
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int|null
     */
    public function getOrigin()
    {
        return $this->origin;
    }

}
