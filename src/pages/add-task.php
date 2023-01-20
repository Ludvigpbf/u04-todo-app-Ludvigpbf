<?php
 
include '../functions/db-conn.php';

$messages = [
    "success" => "Task added!",
    "failed" => "All fields must be filled in!",
];

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
<a class="previous" href="javascript:history.back()"><img src="..\assets\images\Vector.png" alt=""><span>Previous</span></a>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <section class="new-task">
        <form class="task_form" method="POST" action="add-task.php">
        <label class="heading" for="title">Title</label>
        <input name="title" class="task-text" type="text" placeholder="Add a title" maxlength="30" autocomplete="off"/><!-- count down letters -->
        <label class="heading" for="task">Add task</label>
        <textarea name="task" class="txt-content" cols="10" rows="5" placeholder="What do you need to do?" maxlength="150"></textarea>
        <div class="buttons"><label class="ad-picture" for="img">+ Add image<input type="file" class="img" name="img" accept="image/*"></label>
        <button class="ad-btn" type="submit">+ Add task</button></div>
    </form>
</section>
<?php if(!empty($_POST['title']) && !empty($_POST['task']) && isset($_POST['img'])){
    $title = $_POST['title'];
    $task = $_POST['task'];
    $picture = $_POST['img'];
    
    $sql = "INSERT INTO tasks(title, task, picture) VALUES ('$title', '$task', '$picture')";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
?><div class="message"><p class="mess"><?php echo $messages['success'];
}else{ /* if empty do this */
    ?></p></div><div class="hidden"><p class="mess"><?php echo $messages['failed'];}?></p></div>
    <footer>
        <div id="links">
        <a href="../index.php">
        <img src="../assets/images/gg_list.png" alt="List">
        </a>
        <a href="#"><img src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
        <a href="#"><img src="../assets/images/mdi_user.png" alt="Profile"></a>
        <a href="#"><img src="../assets/images/ph_trash-bold.png" alt="Deleted"></a></div>
    
        <button title="Add a new task"type="button">+</button>
        
    </footer>
</body>
</html>
