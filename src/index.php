<?php
include 'db-conn.php';
include 'status.php';
$stmt = $pdo->query('SELECT id, title, task, done FROM tasks');

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
    <?php include 'delete.php'; ?>
    <section id="task-list">
        <div id="card-header"> 
            <div id="select-all">
                <input type="checkbox" name="select-all" value="all-selected">
                <p>Select all</p>
            </div>
            <h1>Tasks</h1>
            <a href="index.php">Refresh</a>
        </div>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?> 
        <div id="task-field">
            <div class="taskbox">
                <form action="index.php?statusCheck=<?php echo $row['id'];?>" method="post">            
                    <button type="submit" class="statusBtn" id="<? if(isset($_POST['status']) && $_POST['status'] == 0){echo "done";}else if (isset($_POST['status']) && $_POST['status'] == 1){echo "not-done";} ?>" name="status" value="<? echo $row['done'];?>">Done</button>
                </form> 
                <div class="task-content">
                    <p id="hidden"><?php echo $row['id'];?></p>
                    <a href="view.php?view-task=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                    <p id="taskEcho"><?php echo $row['task'];?></p>
                </div> 
            </div>
            <div id="buttons">
                <a id="edit" href="edit.php?edit-task=<?php echo $row['id'];?>">Edit</a> 
                <a id="delete" href="index.php?delete-task=<?php echo $row['id'];?>">Delete</a> <!-- Do this on select-all!!! -->
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
        <button type="button"><a href="add-task.php">+</button>
    </footer>
</body>

</html>
