<?php
include 'db-conn.php';

if(isset($_POST['status']) && $_POST['status'] == 0) 
{
    
    $id=$_GET['statusCheck'];
    $done = 1;
    $stsBtnDone = "done";
    $sql = "UPDATE tasks SET done='$done', class='$stsBtnDone' WHERE id='$id'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message"><p class="mess">Task done</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    } 
else if (isset($_POST['status']) && $_POST['status'] == 1)
{
    $id=$_GET['statusCheck'];
    $notDone = 0;
    $stsBtn = "notDone";
    $sql = "UPDATE tasks SET done='$notDone', class='$stsBtn' WHERE id='$id'";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message-undone"><p class="mess">Task not done</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    }

?>