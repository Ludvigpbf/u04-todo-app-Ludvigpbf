<?php


include 'db-conn.php';

$stmt = $pdo->query('SELECT title, task FROM tasks');
$stmt = $pdo->query('SELECT id FROM tasks');

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
    <section id="task-list">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?> 
        <div id="task-field"><div class="taskbox">
            <input type="checkbox" name="status" id="checked">
            <div class="task-content" href="edit.php">
                <h3><?php echo $row['title'];?></h3>
                <p><?php echo $row['task'];?></p>
            </div> 
        </div>
        <div id="buttons">
                <a id="edit" href="#">Edit</a> 
                <a id="delete" href="#">Delete</a>
            </div></div>
        <?php }?>
    </section>
    <footer>
        <div id="links">
            <a href="index.php">
            <img class="icons" src="../assets/images/gg_list.png" alt="List">
            </a>
            <a href="#"><img class="icons" src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
            <a href="#"><img class="icons" src="../assets/images/mdi_user.png" alt="Profile"></a>
            <a href="#"><img class="icons" src="../assets/images/ph_trash-bold.png" alt="Deleted"></a>
        </div>
        <button type="button"><a href="add-task.php">+</button>
    </footer>
</body>

</html>