<?php
namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /* -------------- Register new user -------------------------------- */
    public function register(UserDTO $userDTO, $confirmPassword): bool
    {
    	/* --------------- check user exist ------------------- */
	    if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            throw new \Exception('Username already exist !') ;
        }
	    /* --------------- check  password  confirm ------------ */
	    if($userDTO->getPassword() != $confirmPassword){
		    throw new \Exception('Password mishmash - try again !');
	    }

        $plainPassword = trim($userDTO->getPassword());
        $passwordHash = password_hash($plainPassword,PASSWORD_BCRYPT);
        $userDTO->setPassword($passwordHash);

        $result = $this->userRepository->insert($userDTO);
        return $result;
    }


	public function login( string $username, string $password ): ?UserDTO {
		$user = $this->userRepository->findOneByUsername($username);
		if($user === null){
			throw new \Exception('Invalid user !');
		}
		$passwordHash = $user->getPassword();
		if(password_verify($password,$passwordHash) === true){
			return $user;
		}

		throw new \Exception('Invalid password !');
	}

	public function getCurrentUser():?UserDTO {
    	if(!isset($_SESSION['id'])) {
    		return null;
	    }
		return	$this->userRepository->findOne($_SESSION['id']);
	}

	public function editProfile( UserDTO $user ): bool {
		$plainPassword = trim($user->getPassword());
		$passwordHash = password_hash($plainPassword,PASSWORD_BCRYPT);
		$user->setPassword($passwordHash);
		return $this->userRepository->update($_SESSION['id'],$user);
	}

	/**
	 * @return \Generator|UserDTO[]
	 */
	public function viewAll(): \Generator {
		return $this->userRepository->findAll();
	}
}