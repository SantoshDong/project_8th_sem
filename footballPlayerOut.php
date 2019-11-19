<?php
    session_start();
    $id=$_REQUEST['id'];
    $out=$_REQUEST['out'];
    // echo $id."<br>".$in;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlquery =mysqli_query($conn,"UPDATE footballplayer SET play=$out WHERE id=$id");
    if($sqlquery){
        header('location:footballScoreboard.php');
    }
?>