<?php
 
/* include 'db-conn.php'; */
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
    echo "Connection established!";
} catch(\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$messages = [
    "success" => "Task added!",
    "failed" => "<br>Something went wrong,<br> Please try again.",
];


if(isset($_POST['submit'])){
    $title = ($_POST['title']);
    $task = ($_POST['task']);

    $sql = "INSERT INTO tasks (title, task) VALUES ($title, $task)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($sql);
    echo $messages['success'];
}else{
    echo $messages['failed'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ludvig Flyckt">
    <link rel="stylesheet" href="/styling/style.css">
    <link rel="icon" href="../assets/images/TM-logo.png" type="iamge/x-icon">
    <title>Task Manager</title>
</head>

<body>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <section id="new-task">
        <form id="task_form" method="POST" action="add-task.php">
        <label class="heading" for="title">Title</label>
        <input name="title" id="taskTitle" class="task-text" type="text" placeholder="Title" maxlength="30" autocomplete="off"/><!-- count down letters -->
        <label class="heading" for="task">Add task</label>
        <textarea name="task" id="txt-content" cols="10" rows="2" placeholder="What do you need to do?" maxlength="150"></textarea>
        <div id="buttons"><label id="ad-picture" for="img">+ Add image<input type="file" id="img" name="img" accept="image/*"></label>
        <button id="ad-btn" type="submit">+ Add task</button></div>
    </form>
</section>
<div class="message"><p id="mess"></p></div><?php }?>
    <footer>
        <div id="links">
        <a href="index.php">
        <img src="../assets/images/gg_list.png" alt="List">
        </a>
        <a href="#"><img src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
        <a href="#"><img src="../assets/images/mdi_user.png" alt="Profile"></a>
        <a href="#"><img src="../assets/images/ph_trash-bold.png" alt="Deleted"></a></div>
    
        <button type="button">+</button>
        
    </footer>
</body>

</html>