<?php
include '../functions/db-conn.php';
include '../functions/copy.php';
include '../functions/delete.php';
include '../functions/status.php';
include '../functions/markAllDone.php';
include '../functions/DeleteDoneTasks.php';
include '../functions/unMarkAll.php';
include '../functions/darkMode.php';


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
<?php
        $stmtClass = $pdo->query('SELECT id, class FROM darkmode');
        while ($class = $stmtClass->fetch(PDO::FETCH_ASSOC)){?> 
<body class="<?php echo $class['class'];?>">
<a class="previous" href="../index.php"><img src="..\assets\images\Vector.png" alt=""><span>Start</span></a>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <h1 class="heading1">Task Manager</h1>
    <section class="task-list">
        <div class="card-header"> 
            <h1>Tasks</h1>
        </div>
        <div class="selectOperations"><form action="<?echo $_SERVER["PHP_SELF"]?>" class="allDoneForm" method="post">          
                    <button type="submit" class="allDone" name="markAllDone">Mark all as done</button>
                </form> 
                <form action="<?echo $_SERVER["PHP_SELF"]?>" class="deleteAllForm" method="post">          
                    <button type="submit" class="allDelete" name="delete-all-done">Delete all done tasks</button>
                </form>
                <form action="<?echo $_SERVER["PHP_SELF"]?>" class="unMarkAllForm" method="post">          
                    <button type="submit" class="unMarkAll" name="unMarkAll">Unmark all tasks</button>
                </form> 
        </div>
        <?php
        $stmt = $pdo->query('SELECT id, title, task, done, class FROM tasks');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?> 
            
        <div class="task-field">
            <div class="taskbox">
                <form action="./list.php?statusCheck=<?php echo $row['id'];?>" class="statusForm" method="post">            
                    <button type="submit" class="<?php echo $row['class'];?>" name="status" value="<? echo $row['done'];?>">Done</button>
                </form> 
                <div class="task-content">
                    <p class="hidden"><?php echo $row['id'];?></p>
                    <a href="./view.php?view-task=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                    <p class="taskEcho"><?php echo $row['task'];?></p>
                </div> 
            </div>
            <div class="buttons">
                <a class="edit" href="./edit.php?edit-task=<?php echo $row['id'];?>">Edit</a> 
                <a class="delete" href="<?echo $_SERVER["PHP_SELF"]?>?delete-task=<?php echo $row['id'];?>">Delete</a> <!-- Do this on select-all!!! -->
                <a class="copy" href="<?echo $_SERVER["PHP_SELF"]?>?copy-task=<?php echo $row['id'];?>">Copy</a>
            </div>
        </div>
        <?php }?>
        
    </section>
    
    <footer>
        <div id="links">
            <a href="./list.php">
            <img class="icons" src="../assets/images/gg_list.png" alt="List">
            </a><form action="<?echo $_SERVER["PHP_SELF"]?>?darkMode=<?php echo $class['id'];?>" class="darkModeForm" method="post">            
                    <button onclick="colorMode(colorToggle)" type="submit" class="darkMode" name="darkMode" value="<? echo $class['id'];?>">Dark Mode</button>
                </form>
        </div> 
        <button class="add" type="button"><a href="./add-task.php">+</button>
    </footer>
</body>
<? } ?>
</html>
