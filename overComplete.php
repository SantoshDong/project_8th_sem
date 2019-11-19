<?php
    $id = $_REQUEST['id'];
    $play = $_REQUEST['play'];
    echo $id."<br>".$play;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                $tover = $news['bover']+1;
                //echo "<br>"."Total Ball Face :-".$tball;
            }
        }
    }

    $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET ballplay=$play, bover=$tover WHERE id=$id");
    if($sqlquery){
        header('location:adminCricketBoard.php');
    }
?>