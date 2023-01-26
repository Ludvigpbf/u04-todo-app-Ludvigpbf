<?php
include '../functions/db-conn.php';

$stmt = $pdo->query('SELECT id, title, task, picture, done, class FROM tasks');



?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ludvig Flyckt">
    <link rel="stylesheet" href="/styling/style.css">
    <link rel="icon" href="../assets/images/TM-logo.png" type="iamge/x-icon">
    <title>Task Manager</title>
</head>
</head>
<body>
    <a class="previous" href="javascript:history.back()"><img src="..\assets\images\Vector.png" alt=""><span>Previous</span></a>
<header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
<?php if(isset($_GET['view-task'])){
        $id=$_GET['view-task'];
        $sql = "SELECT id, title, task, picture, done, class FROM tasks WHERE id=$id";
        $run = $pdo->prepare($sql);
        $run->execute();
        if($run){
            while ($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
<section class="task-card">
    <div class="task-view">
        <p class="hidden"><?php echo $row['id'];?></p>
        <h3>"<?php echo $row['title'];?>"</h3>
        <p><?php echo $row['task'];?></p>
    </div>
    <div class="task-img">
        <img src="<?php echo $row['picture'];?>" alt="task-image">
    </div>
    <div class="operations">
        <a class="edit" href="edit.php?edit-task=<?php echo $row['id'];?>">Edit</a>
        <a class="delete" href="index.php?delete-task=<?php echo $row['id'];?>">Delete</a>
        <a class="copy" href="index.php?copy-task=<?php echo $row['id'];?>">Copy</a>
        <form action="index.php?statusCheck=<?php echo $row['id'];?>" method="post">            
                    <button type="submit" class="<?php echo $row['class'];?>"  name="status" value="<? echo $row['done'];?>">Done</button>
                </form> 
</section>


<? }} else {
    echo '<div class="message"><p class="mess">Something went wrong.. please try again!</p></div>';
    }
 }  ?>
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
