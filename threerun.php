<?php
    session_start();
    $id = $_REQUEST['id'];
    $run = $_REQUEST['run'];
    $matchno = $_SESSION['id'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                $playerTeam = $news['team'];
                $trun = $news['run'] + $run;
                $tball = $news['ballface'] + 1;
            }
        }
    }
    //Insert run to team and individual player
    $sqlquery45 = mysqli_query($conn,"UPDATE cricketplayer SET ballface=$tball , run=$trun WHERE id=$id");
        if($sqlquery45){
            $result = mysqli_query($conn,"SELECT * from matchinfo WHERE id=$matchno");
            if($result){
                if(mysqli_num_rows($result)>0){    
                    while($news24 = mysqli_fetch_assoc($result)){
                    if($playerTeam == $news24['teamA']){
                        $teamRun = $news24['runA']+$run;
                        $sql1 = mysqli_query($conn,"UPDATE matchinfo SET runA=$teamRun  WHERE id=$matchno");
                        if($sql1){
                            header('location:adminCricketBoard.php');
                        }
                    }

                    else if($playerTeam == $news24['teamB']){
                        $teamRun = $news24['runB']+$run;
                        $sql12 = mysqli_query($conn,"UPDATE matchinfo SET runB=$teamRun  WHERE id=$matchno");
                        if($sql12){
                            header('location:adminCricketBoard.php');
                        }
                    }
                }
            }   
        }
    }
?>