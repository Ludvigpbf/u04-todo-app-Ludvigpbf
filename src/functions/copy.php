<?php

include 'db-conn.php';

if(isset($_GET['copy-task'])){
    $id=$_GET['copy-task'];
    $sql = "INSERT INTO tasks(  title, task, done, class) SELECT  title, task, done, class FROM tasks WHERE id=$id";
    $copy = $pdo->prepare($sql);
    $copy->execute();
    if($copy){
        echo '<div class="message"><p class="mess">Task copied</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
}
?>