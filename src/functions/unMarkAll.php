<?php
include 'db-conn.php';

if(isset($_POST['unMarkAll'])) 
{
    
    $done = 0;
    $stsBtnDone = "notDone";
    $sql = "UPDATE tasks SET done='$done', class='$stsBtnDone'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message-undone"><p class="mess">All tasks undone</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    }
?>