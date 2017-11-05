<?php
spl_autoload_register();
use Database\PDODatabase;
$db = 'test';
$host = 'localhost';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);

$db = new PDODatabase($pdo);
$stmt = $db->query('SELECT * FROM `users`');
$rs = $stmt->execute();
/** @var UserTransferObject [] $allUsers */
$allUsers = $rs->fetch(UserTransferObject::class);
foreach ($allUsers as $user){
    echo $user->getId().' | '.$user->getUsername().' | '.$user->getPassword().'<br/>';

}