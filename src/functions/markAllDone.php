<?php
include 'db-conn.php';

if(isset($_POST['select-all'])) 
{
    
    $done = 1;
    $stsBtnDone = "done";
    $sql = "UPDATE tasks SET done='$done', class='$stsBtnDone'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message"><p class="mess">All tasks done</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    } else if(isset($_POST['select-all'])) 
    {
        
        $done = 0;
        $stsBtnDone = "notDone";
        $sql = "UPDATE tasks SET done='$done', class='$stsBtnDone'";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        if($stmt){
            echo '<div class="message"><p class="mess">All tasks undone</p></div>';
        }else{
            echo "Hmm.. it didnt work..";
        }
        }

?>