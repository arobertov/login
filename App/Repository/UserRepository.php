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
            "INSERT INTO `users`(username, password, first_name, last_name,born_on) 
                    VALUES (?,?,?,?,?)
        ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
	        $user->getBornOn()
        ]);
        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
       return $this->db->query("
                   SELECT `id`,`username`,`password`,`first_name` AS firstName,`last_name` AS lastName,`born_on` AS bornOn
                   FROM `users`
                   WHERE `username`=?
        ")
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

	public function findOne( int $id ): ?UserDTO {
		return $this->db->query("
                   SELECT `id`,`username`,`password`,`first_name` AS firstName,`last_name` AS lastName,`born_on` AS bornOn
                   FROM `users`
                   WHERE `id`=?
        ")
		                ->execute([$id])
		                ->fetch(UserDTO::class)
		                ->current();
	}

	public function update( $id, UserDTO $user ): bool {
		$stmt = $this->db->query( "
		   	        UPDATE `users`
		   	        SET username = ?,
		   	        password = ?,
		   	        first_name = ?,
		   	        last_name = ?,
		   	        born_on = ?
		   	        WHERE
		   	        `id`=?
		" );
		$stmt->execute( [
			    $user->getUsername(),
			    $user->getPassword(),
			    $user->getFirstName(),
			    $user->getLastName(),
			    $user->getBornOn(),
			    $id
		    ] );
		return true;
	}

	/**
	 * @return \Generator|UserDTO[]
	 */
	public function findAll(): \Generator {
		return $this->db->query("
			 SELECT `id`,`username`,`password`,`first_name` AS firstName,`last_name` AS lastName,`born_on` AS bornOn
			 FROM `users`
		")->execute()
		  ->fetch(UserDTO::class);
			
	}
}