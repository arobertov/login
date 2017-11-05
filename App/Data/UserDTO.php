<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 18:56
 */

namespace App\Data;


class UserDTO
{
    /**
     * @var int
     */
    private $id=null;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $registered;

    public static function create($username,$password,$firstName,$lastName,$id = null){
        $user = new UserDTO();
        $user->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName);
        return $user;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id):UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username):UserDTO
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password):UserDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName):UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName):UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistered(): string
    {
        return $this->registered;
    }

    public function setRegistered(string $registered):UserDTO
    {
        $this->registered = $registered;
        return $this;
    }

}