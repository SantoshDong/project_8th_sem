<?php
    session_start();
    $id=$_REQUEST['id']; 
    $goal=$_REQUEST['goal'];
    $matchno = $_SESSION['football_id'];
   // $teamA =  $_SESSION['football_teamA']; 
   // $teamB = $_SESSION['football_teamB'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //fetch goal from each player at first and add one to his previous one
    $sql=mysqli_query($conn,"SELECT goal, team from footballplayer WHERE id=$id");
    if($sql){
        if(mysqli_num_rows($sql)>0){
            while($news = mysqli_fetch_assoc($sql)){
                //print_r($news);
                //echo $news['goal']."<br>";
                $newGoal = $news['goal'] + $goal;
                $goalteam = $news['team'];
                echo $newGoal."<br>";
                //update the new goal to database
                $sqlquery =mysqli_query($conn,"UPDATE footballplayer SET goal=$newGoal WHERE id=$id");
                if($sqlquery){
                    $sql2=mysqli_query($conn,"SELECT * from footballmatchinfo WHERE id=$matchno");
                    if($sql2){
                        if(mysqli_num_rows($sql2)>0){
                            while($team = mysqli_fetch_assoc($sql2)){
                            //print_r($team);
                                $teamA = $team['teamA'];
                                $teamB = $team['teamB'];
                                if($goalteam == $teamA){
                                    $goalA = $team['goalA'] + $goal;
                                    //echo $goalA;
                                    //update the new goal to database
                                    $sqlquery =mysqli_query($conn,"UPDATE footballmatchinfo SET goalA=$goalA WHERE id=$matchno");
                                    if($sqlquery){
                                        header('location:footballScoreboard.php');
                                    }
                                }
                                else if ($goalteam == $teamB){
                                    $goalB = $team['goalB'] + $goal;
                                    //echo $goalB;
                                    //update the new goal to database
                                    $sqlquery =mysqli_query($conn,"UPDATE footballmatchinfo SET goalB=$goalB WHERE id=$matchno");
                                    if($sqlquery){
                                        header('location:footballScoreboard.php');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

?>