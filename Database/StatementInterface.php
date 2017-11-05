<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 11:51
 */

namespace Database;


interface StatementInterface
{
    public function execute(array $params = []):ResultSetInterface;
}