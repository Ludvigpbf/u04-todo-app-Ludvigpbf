<?php
 
include '../functions/db-conn.php';
include '../functions/darkMode.php';

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

<?php
        $stmtClass = $pdo->query('SELECT id, class FROM darkmode');
        while ($class = $stmtClass->fetch(PDO::FETCH_ASSOC)){?> 
<body class="<?php echo $class['class'];?>">
<a class="previous" href="./list.php"><img src="..\assets\images\Vector.png" alt="Start"><span>The list</span></a>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <section class="new-task">
        <form class="task_form" method="POST" action="add-task.php">
        <label class="heading" for="title">Title</label>
        <input name="title" class="task-text" type="text" placeholder="Add a title" maxlength="30" autocomplete="off"/><!-- count down letters -->
        <label class="heading" for="task">Add task</label>
        <textarea name="task" class="txt-content" cols="10" rows="5" placeholder="What do you need to do?" maxlength="150"></textarea>
        <div class="buttons">
        <button class="ad-btn" type="submit">+ Add task</button></div>
    </form>
</section>
<?php if(!empty($_POST['title']) && !empty($_POST['task'])){
    $title = $_POST['title'];
    $task = $_POST['task'];
    
    
    $sql = "INSERT INTO tasks(title, task) VALUES ('$title', '$task')";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
?><div class="message"><p class="mess"><?php echo $messages['success'];
}else if(!empty($_POST['title']) || !empty($_POST['task'])){
    ?></p></div><div class="message-red"><p class="mess"><?php echo $messages['failed'];}?></p></div>
    
    <footer>
        <div id="links">
            <a href="./list.php">
            <img class="icons" src="../assets/images/gg_list.png" alt="List">
            </a><form action="<?echo $_SERVER["PHP_SELF"]?>?darkMode=<?php echo $class['id'];?>" class="darkModeForm" method="post">            
                    <button type="submit" class="darkMode" name="darkMode" value="<? echo $class['id'];?>">Dark Mode</button>
                </form>
        </div> 
        <button class="add" type="button"><a href="./add-task.php">+</button>
    </footer>
</body>
<? }?>
</html>
