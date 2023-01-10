<?php 

include 'db-conn.php';

if(isset($_GET['delete-task'])){
    $id=$_GET['delete-task'];

    $sql = "DELETE FROM tasks WHERE id=$id";
    $run = $pdo->prepare($sql);
    $run->execute();
    if($run){
        echo '<div class="message"><p class="mess">Task deleted!</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
}
?>