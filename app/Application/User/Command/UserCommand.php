<?php

namespace App\Application\User\Command;

class UserCommand {

    private $name;
    private $email;
    private $password;

    public function __construct(
        string $name,
        string $email,
        string $password
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


}
