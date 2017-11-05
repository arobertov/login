<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 19:35
 */

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO,$confirmPassword):bool ;
}