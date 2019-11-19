<?php
    $ball = $_REQUEST['dot'];
    $id = $_REQUEST['id'];
    //echo "Ball:-".$ball."Id:- ".$id;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                //echo $news['bdot'];
                $tdot = $news['bdot']+1;
                //echo "<br>"."Total Dot Ball :-".$tdot;
            }
        }
    }

    $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET bdot=$tdot WHERE id=$id");
    if($sqlquery){
        header('location:adminCricketBoard.php');
    }
?>