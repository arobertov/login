<?php
namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $user): bool
    {
        $this->db->query(
            "INSERT INTO `users`(username, password, first_name, last_name) 
                    VALUES (?,?,?,?)
        ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName()
        ]);
        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
       return $this->db->query("
                   SELECT `id`,`username`,`password`,`first_name` AS firstName,`last_name` AS lastName
                   FROM `users`
                   WHERE `username`=?
        ")
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }
}