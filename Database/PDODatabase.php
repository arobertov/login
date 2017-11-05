<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 16:44
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }

    public function getLastError(): array
    {
        // TODO: Implement getLastError() method.
    }

}