<?php
include 'functions/db-conn.php';
include 'functions/copy.php';
include 'functions/delete.php';
include 'functions/status.php';
include 'functions/markAllDone.php';
include 'functions/DeleteDoneTasks.php';

$stmt = $pdo->query('SELECT id, title, task, done, class FROM tasks');
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
    <h1 class="heading1">Task Manager</h1>
    <section class="task-list">
        <div class="card-header"> 
            <h1>Tasks</h1>
        </div>
        <div class="selectOperations"><form action="<?echo $_SERVER["PHP_SELF"]?>" class="allDoneForm" method="post">          
                    <button type="submit" class="allDone" name="select-all">Mark all as done</button>
                </form> 
                <form action="<?echo $_SERVER["PHP_SELF"]?>" class="deleteAllForm" method="post">          
                    <button type="submit" class="allDelete" name="delete-all-done">Delete all done tasks</button>
                </form> 
        </div>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?> 
            
        <div class="task-field">
            <div class="taskbox">
                <form action="../index.php?statusCheck=<?php echo $row['id'];?>" class="statusForm" method="post">            
                    <button type="submit" class="<?php echo $row['class'];?>" name="status" value="<? echo $row['done'];?>">Done</button>
                </form> 
                <div class="task-content">
                    <p class="hidden"><?php echo $row['id'];?></p>
                    <a href="pages/view.php?view-task=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                    <p class="taskEcho"><?php echo $row['task'];?></p>
                </div> 
            </div>
            <div class="buttons">
                <a class="edit" href="pages/edit.php?edit-task=<?php echo $row['id'];?>">Edit</a> 
                <a class="delete" href="<?echo $_SERVER["PHP_SELF"]?>?delete-task=<?php echo $row['id'];?>">Delete</a> <!-- Do this on select-all!!! -->
                <a class="copy" href="<?echo $_SERVER["PHP_SELF"]?>?copy-task=<?php echo $row['id'];?>">Copy</a>
            </div>
        </div>
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
        <button type="button"><a href="pages/add-task.php">+</button>
    </footer>
</body>
<script type="text/javascript" src="../js/app.js">
</script>
</html>
