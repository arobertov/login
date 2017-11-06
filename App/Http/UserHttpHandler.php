<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 20:13
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
	public function index(UserServiceInterface $userService){
		 if($currentUser = $userService->getCurrentUser()){
		 	$this->render('users/profile',$currentUser);
		 }else {
		 	$this->render('home/index');
		 }
	}

	public function allUsers(UserServiceInterface $userService){
		$this->render('users/all',$userService->viewAll());
	}

	public function profile(UserServiceInterface $userService,array $formData=[]){
		if(isset($formData['edit'])) {
			$this->handleEditProcess( $userService, $formData );
		}

		$currentUser = $userService->getCurrentUser();
		if($currentUser === null){
			$this->redirect('login.php');
		}

			$this->render( 'users/profile', $currentUser );

	}

	public  function login(UserServiceInterface $userService,array $formData=[])
	{
	   if(isset($formData['login'])){
	   	    $this->handleLoginProcess($userService,$formData);
	   } else {
	   	    $this->render('users/login');
	   }
	}

    public function register(UserServiceInterface $userService,array $formData=[])
    {
        if(isset($formData['register'])){
            $user =  UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['born_on']
            );

            if($userService->register($user,$formData['confirm_password']))
            {
            	$this->redirect('login.php');
            } else{
            	$this->render('app/error',new ErrorDTO('Cannot register, maybe username is already 
                taken or password mismatch !'));
            }
        }else {
            $this->render('users/register');
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService,array $formData=[])
    {
	    $loggedUser = $userService->login($formData['username'],$formData['password']);
	    if(null !== $loggedUser){
	    	$_SESSION['id'] = $loggedUser->getId();
	    	$this->redirect('profile.php');
	    } else{
		    $this->render('app/error',new ErrorDTO('Username not exist or  password mismatch !')) ;
	    }
    }

    private function handleEditProcess(UserServiceInterface $userService,array $formData=[]){
	    $user =  UserDTO::create(
		    $formData['username'],
		    $formData['password'],
		    $formData['first_name'],
		    $formData['last_name'],
	        $formData['born_on']);
	    $userService->editProfile($user);
    }
}