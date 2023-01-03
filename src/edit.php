<?php
 
include 'db-conn.php';

$messages = [
    "success" => "Task updated!",
    "failed" => "All fields must be filled in!",
];
$id=$_GET['edit-task'];
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
        <form id="task_form" method="POST" action="edit.php">
        <label class="heading" for="title">Update title</label>
        <input name="title" id="taskTitle" class="task-text" type="text" placeholder="Add a title" maxlength="30" autocomplete="off"/><!-- count down letters -->
        <label class="heading" for="task">Update task</label>
        <textarea name="task" id="txt-content" cols="10" rows="2" placeholder="What do you need to do?" maxlength="150"></textarea>
        <div id="buttons"><label id="ad-picture" for="img">Update image<input type="file" id="img" name="img" accept="image/*"></label>
        <button id="ad-btn" type="submit">Update task</button></div>
    </form>
</section>
<?php if(!empty($_POST['title']) && !empty($_POST['task'])){
    $title = $_POST['title'];
    $task = $_POST['task'];
    
    $sql = "UPDATE tasks SET title=$title, task=$task";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
?><div class="message"><p class="mess"><?php echo $messages['success'];
}else{
    ?></p></div><div id="hidden"><p class="mess"><?php echo $messages['failed'];}?></p></div>
    <footer>
        <div id="links">
        <a href="index.php">
        <img src="../assets/images/gg_list.png" alt="List">
        </a>
        <a href="#"><img src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
        <a href="#"><img src="../assets/images/mdi_user.png" alt="Profile"></a>
        <a href="#"><img src="../assets/images/ph_trash-bold.png" alt="Deleted"></a></div>
    
        <button title="Add a new task"type="button">+</button>
        
    </footer>
</body>

</html>