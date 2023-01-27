<?php
include 'functions/db-conn.php';
include 'functions/darkMode.php';


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
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <h1 class="heading1">Task Manager</h1>
    <p id="infoTxt">This is a to do app where you can enter and save your various tasks that need to be remembered. Press the button to get started!</p>
    <a id="start" href="pages/add-task.php">Get started</a>

    <footer>
        <div id="links">
            <a href="../pages/list.php">
            <img class="icons" src="../assets/images/gg_list.png" alt="List">
            </a><form action="<?echo $_SERVER["PHP_SELF"]?>?darkMode=<?php echo $class['id'];?>" class="darkModeForm" method="post">            
                    <button onclick="colorMode(colorToggle)" type="submit" class="darkMode" name="darkMode" value="<? echo $class['id'];?>">Dark Mode</button>
                </form>
        </div> 
        <button class="add" type="button"><a href="pages/add-task.php">+</button>
    </footer>
</body>
<? } ?>
<script type="text/javascript" src="js/app.js"></script>
</html>
