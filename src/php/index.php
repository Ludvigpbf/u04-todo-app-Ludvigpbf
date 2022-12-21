lines (24 sloc)  644 Bytes

<?php

$host ='db';
$db   = 'company';
$user = 'root';
$pass = 'example';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT name, fav_color FROM users');
while ($row = $stmt->fetch())
{
    echo $row['name'] . "\n";
    echo $row['fav_color'] . "\n";
}

?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ludvig Flyckt">
    <link rel="stylesheet" href="/Styling/style.css">
    <title>To do</title>
</head>

<body>
    <header></header>
    <section></section>
    <footer>
    </footer>
</body>

</html> -->