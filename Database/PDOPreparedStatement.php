<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 16:51
 */

namespace Database;


class PDOPreparedStatement implements StatementInterface
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
        return new PDOResultSet($pdoStatement);
    }

    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}