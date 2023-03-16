
<?php
include '../functions/db-conn.php';

$messages = [
    "success" => "Task updated!",
    "failed" => "All fields must be filled in!",
];
if(isset($_POST['update'])){
    $title = $_POST['title'];
    $task = $_POST['task'];
    $id = $_POST['task-id'];
    
    $sql = "UPDATE tasks SET title='$title', task='$task' WHERE id='$id'";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($sql == TRUE){
        echo '<div class="message"><p class="mess">Task updated!</p></div>';
    } else{
        echo "Error:";
    }
}
asd
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
<a class="previous" href="./list.php"><img src="..\assets\images\Vector.png" alt=""><span>The list</span></a>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <?php
    if(isset($_GET['edit-task'])){
        $id=$_GET['edit-task'];
        $sql = "SELECT id, title, task FROM tasks WHERE id=$id";
        $run = $pdo->prepare($sql);
        $run->execute();
        if($run){
            while ($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
    <section class="new-task">
    
        <form class="task_form" method="POST" action="<?echo $_SERVER["PHP_SELF"]?>?edit-task=<?php echo $row['id'];?>">
        <input type="hidden" name="task-id" value="<?php echo $id; ?>">
        <label class="heading" for="title">Update title</label>
        <input name="title" class="task-text" type="text" maxlength="30" autocomplete="off" value="<?php echo $row['title'];?>"/><!-- count down letters -->
        <label class="heading" for="task">Update task</label>
        <textarea name="task" class="txt-content" cols="10" rows="5" maxlength="150"><?php echo $row['task'];?></textarea>
        <div class="buttons">
        <button class="ad-btn" type="submit" name="update">Update task</button></div>
    </form>
    
</section>
<?php }} else {
    echo '<div class="message"><p class="mess">Something went wrong.. please try again!</p></div>';
    }
 } 
 
?>
    
    <footer>
        <div id="links">
            <a href="./list.php">
            <img class="icons" src="../assets/images/gg_list.png" alt="List">
            </a><form action="./list.php?darkMode=<?php echo $class['id'];?>" class="darkModeForm" method="post">            
                    <button type="submit" class="darkMode" name="darkMode" value="<? echo $class['id'];?>">Dark Mode</button>
                </form>
        </div> 
        <button class="add" type="button"><a href="./add-task.php">+</button>
    </footer>
</body>
<? }?>
</html>
