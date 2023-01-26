<?php
include 'db-conn.php';

if(isset($_POST['delete-all-done'])) 
{
    
    $done = 1;
    $stsBtnDone = "done";
    $sql = "DELETE FROM tasks WHERE done=$done";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message"><p class="mess">Tasks Deleted</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    }

?> 