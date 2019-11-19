<?php
    session_start();
    $id=$_REQUEST['id']; 
    $yellow=$_REQUEST['yellow'];
    $matchno = $_SESSION['football_id'];
    //echo $id."<br>".$yellow."<br>".$matchno;
    // $teamA =  $_SESSION['football_teamA']; 
    // $teamB = $_SESSION['football_teamB'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //fetch goal from each player at first and add one to his previous one
    $sql=mysqli_query($conn,"SELECT yellow from footballplayer WHERE id=$id");
    if($sql){
        if(mysqli_num_rows($sql)>0){
            while($news = mysqli_fetch_assoc($sql)){
                //echo $news['yellow']."<br>";
                $yellowCard = $news['yellow'] + $yellow;
                //echo $yellowCard;
                $sqlquery =mysqli_query($conn,"UPDATE footballplayer SET yellow=$yellowCard WHERE id=$id");
                if($sqlquery){
                    //echo $yellowCard;
                    if($yellowCard == 2){
                        $sqlquery2 =mysqli_query($conn,"UPDATE footballplayer SET red=1 WHERE id=$id");
                        if($sqlquery2){
                            header('location:footballScoreboard.php');
                        }
                    }
                    else{
                        header('location:footballScoreboard.php');
                    }
                }
            }
        }
    }
?>