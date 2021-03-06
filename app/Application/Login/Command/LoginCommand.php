<?php
namespace App\Application\Login\Command;

class LoginCommand {

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    public function __construct(
        $email,
        $password
    )
    {
        $this->email = $email;
        $this->password = $password;
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
