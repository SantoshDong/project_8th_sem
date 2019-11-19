<?php
    $id = $_REQUEST['id'];
    $play = $_REQUEST['dot'];
    echo $id."<br>".$play."<br>";
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                //echo $news['ballface'];
                $tball = $news['ballface'] + $play;
                //echo "Total Ball Face :-".$tball;
            }
        }
    }
    $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET ballface=$tball WHERE id=$id");
    if($sqlquery){
        header('location:adminCricketBoard.php');
    }
?>