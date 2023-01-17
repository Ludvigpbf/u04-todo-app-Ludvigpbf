<?php
include 'db-conn.php';

if(isset($_POST['status']) && $_POST['status'] == 0) 
{
    $id=$_GET['statusCheck'];
    $done = 1;
    $sql = "UPDATE tasks SET done='$done' WHERE id='$id'";
    echo "checked";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    
    } 
else if (isset($_POST['status']) && $_POST['status'] == 1)
{
    $id=$_GET['statusCheck'];
    $notDone = 0;
    $sql = "UPDATE tasks SET done='$notDone' WHERE id='$id'";
    echo "not checked";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    }

?>