<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 11:44
 */

namespace Database;


interface DatabaseInterface
{
    public function query(string $query):StatementInterface;

    public function getLastError():array ;
}