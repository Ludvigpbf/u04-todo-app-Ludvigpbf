<?php

include 'db-conn.php';

if(isset($_GET['copy-task'])){
    $id=$_GET['copy-task'];
    $sql = "INSERT INTO tasks(  title, task, picture, done, class) SELECT  title, task, picture, done, class FROM tasks WHERE id=$id";
    $copy = $pdo->prepare($sql);
    $copy->execute();
    if($copy){
        
    }else{
        echo "Hmm.. it didnt work..";
    }
}
?>