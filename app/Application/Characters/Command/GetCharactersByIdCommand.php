<?php

namespace App\Application\Characters\Command;



class GetCharactersByIdCommand
{
    /**
     * @var integer
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
