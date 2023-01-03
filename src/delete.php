<?php 

include 'db-conn.php';

if(isset($_GET['delete-task'])){
    $id=$_GET['delete-task'];

    $sql = "DELETE FROM tasks WHERE id=$id";
    $run = $pdo->prepare($sql);
    $run->execute();
    if($run){
        echo "Task deleted!";
    }else{
        echo "Hmm.. it didnt work..";
    }
}
?>