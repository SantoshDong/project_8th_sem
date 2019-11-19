<?php
    session_start();
    $id=$_REQUEST['id'];
    $red=$_REQUEST['red'];
    // echo $id."<br>".$in;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlquery =mysqli_query($conn,"UPDATE footballplayer SET red=$red WHERE id=$id");
    if($sqlquery){
        header('location:footballScoreboard.php');
    }
?>