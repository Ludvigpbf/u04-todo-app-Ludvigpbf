<?php

$dbhost = "db";
$dbname ="todo";
$username = "root";
$password = "example";
$charset = 'utf8mb4';


$dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch(\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>