<?php
session_start();
spl_autoload_register();

$dbI = parse_ini_file('Config/db.ini');
$template = new \Core\Template();
$pdo = new PDO($dbI['dsn'],$dbI['user'],$dbI['pass']);
$db= new \Database\PDODatabase($pdo);