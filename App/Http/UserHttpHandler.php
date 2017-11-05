<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 20:13
 */

namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService,array $formData=[])
    {
        if(isset($formData['register'])){
            $user =  UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name']
            );

            $userService->register($user,$formData['confirm_password']);

            $this->redirect('login.php');
        }else {
            $this->render('users/register');
        }

    }
}