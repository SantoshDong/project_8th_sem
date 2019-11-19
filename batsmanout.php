<?php
    session_start();
    $id = $_REQUEST['id'];
    $play = $_REQUEST['play'];
    $matchno = $_SESSION['id'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                $playerTeam = $news['team'];
                $tballface = $news['ballface']+1;
            }
        }
    }
    //Insert run to team and individual player
    $sqlquery45 = mysqli_query($conn,"UPDATE cricketplayer SET batplay=$play, ballface=$tballface WHERE id=$id");
        if($sqlquery45){
            $result = mysqli_query($conn,"SELECT * from matchinfo WHERE id=$matchno");
            if($result){
                if(mysqli_num_rows($result)>0){    
                    while($news24 = mysqli_fetch_assoc($result)){
                    if($playerTeam == $news24['teamA']){
                        $teamWicket = $news24['wicketA']+1;
                        $sql1 = mysqli_query($conn,"UPDATE matchinfo SET wicketA=$teamWicket  WHERE id=$matchno");
                        if($sql1){
                            header('location:adminCricketBoard.php');
                        }
                    }

                    else if($playerTeam == $news24['teamB']){
                        $teamWicket = $news24['wicketB']+1;
                        $sql12 = mysqli_query($conn,"UPDATE matchinfo SET wicketB=$teamWicket  WHERE id=$matchno");
                        if($sql12){
                            header('location:adminCricketBoard.php');
                        }
                    }
                }
            }   
        }
    }
?>