<?php
session_start();
spl_autoload_register();

$dbI = parse_ini_file('Config/db.ini');
$template = new \Core\Template();
$pdo = new PDO($dbI['dsn'],$dbI['data'],$dbI['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db= new \Database\PDODatabase($pdo);

$userRepository = new \App\Repository\UserRepository( $db );

$userService = new \App\Service\UserService( $userRepository );

$dataBinder = new \Core\DataBinder();

$userHttpHandler = new \App\Http\UserHttpHandler( $template ,$dataBinder);