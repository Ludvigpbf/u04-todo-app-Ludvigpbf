<?php
include 'db-conn.php';

if(isset($_POST['darkMode']) && $_POST['darkMode'] == 0) 
{
    
    $id=$_GET['darkMode'];
    $on = 1;
    $darkMode = "dark-mode";
    $sql = "UPDATE darkmode SET id='$on', class='$darkMode' WHERE id='$id'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message-dark"><p class="mess">Dark mode on</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    } 
else if (isset($_POST['darkMode']) && $_POST['darkMode'] == 1)
{
    $id=$_GET['darkMode'];
    $off = 0;
    $lightMode = "light-mode";
    $sql = "UPDATE darkmode SET id='$off', class='$lightMode' WHERE id='$id'";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if($stmt){
        echo '<div class="message-light"><p class="mess">Light mode on</p></div>';
    }else{
        echo "Hmm.. it didnt work..";
    }
    }

?>