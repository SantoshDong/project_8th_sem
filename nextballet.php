<?php
    $id = $_REQUEST['id'];
    $play = $_REQUEST['play'];
    echo $id."<br>".$play;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET ballplay=$play WHERE id=$id");
    if($sqlquery){
        header('location:adminCricketBoard.php');
    }
?>