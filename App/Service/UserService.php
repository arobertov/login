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

    public function register(UserDTO $userDTO, $confirmPassword): bool
    {
        if($userDTO->getPassword() != $confirmPassword){
            return false;
        }

        if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }

        $plainPassword = $userDTO->getPassword();
        $passwordHash = password_hash($plainPassword,PASSWORD_BCRYPT);
        $userDTO->setPassword($passwordHash);

        $result = $this->userRepository->insert($userDTO);
        return $result;
    }


}