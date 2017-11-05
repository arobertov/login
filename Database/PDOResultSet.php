<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 16:56
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    /**
     * PDOPreparedStatement constructor.
     * @param \PDOStatement $pdoStatement
     */
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function fetch($className):\Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}