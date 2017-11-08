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

	/* ------------------ render user profile and update it -------------------- */
	public function profile(UserServiceInterface $userService,array $formData=[]){
		if(isset($formData['edit'])) {
			try {
				$this->handleEditProcess( $userService, $formData );
			}catch (\Exception $e){
				$this->render('app/error',new ErrorDTO($e->getMessage()));
				exit;
			}
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
            $this->handleRegisterProcess($userService,$formData);
        }else {
            $this->render('users/register');
        }
    }

    private function handleRegisterProcess(UserServiceInterface $userService, array $formData): void
    {
	    $user = $this->dataBinder->bind($formData,UserDTO::class);
	    try {
		    $userService->register($user,$formData['confirm_password']);
		    $this->redirect('login.php');
	    }catch (\Exception $e){
		    $this->render('app/error',new ErrorDTO($e->getMessage()));
	    }
    }

    private function handleLoginProcess(UserServiceInterface $userService,array $formData=[])
    {
    	try{
	        $loggedUser = $userService->login($formData['username'],$formData['password']);
	    	$_SESSION['id'] = $loggedUser->getId();
	    	$this->redirect('profile.php');
	    } catch (\Exception $e){
		    $this->render('app/error',new ErrorDTO($e->getMessage())) ;
	    }
    }

    private function handleEditProcess(UserServiceInterface $userService,array $formData=[]){
	    $user = $this->dataBinder->bind($formData,UserDTO::class);
		    $userService->editProfile( $user );
    }
}