
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
        <div class="buttons"><label class="ad-picture" for="img">Update image<input type="file" class="img" name="img" accept="image/*"></label>
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
        <a href="../index.php">
        <img src="../assets/images/gg_list.png" alt="List">
        </a>
        <a href="#"><img src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
        <a href="#"><img src="../assets/images/mdi_user.png" alt="Profile"></a>
        <a href="#"><img src="../assets/images/ph_trash-bold.png" alt="Deleted"></a></div>
    
        <button title="Add a new task"type="button"><a href="add-task.php">+</button>
        
    </footer>
</body>

</html>