<?php
    $run = $_REQUEST['run'];
    $id = $_REQUEST['id'];
    echo "Run:-".$run."<br> Id:- ".$id;
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    $result =mysqli_query($conn,"SELECT * from cricketplayer WHERE id=$id");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                //print_r($news);
                echo "<br>Previous run concede:-".$news['brun'];
                $trun = $news['brun']+$run;
                $tfour= $news['bfour']+1;
                $tsix = $news['bsixes']+1;
                //echo "<br>"."Total Run Concede :-".$trun;
            }
        }
    }
    if($run==4){
        $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET brun=$trun , bfour=$tfour WHERE id=$id");
        if($sqlquery){
            header('location:adminCricketBoard.php');
        }
    }
    else if($run==6){
        $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET brun=$trun , bsixes=$tsix WHERE id=$id");
        if($sqlquery){
            header('location:adminCricketBoard.php');
        }
    }
    else{
        $sqlquery =mysqli_query($conn,"UPDATE cricketplayer SET brun=$trun WHERE id=$id");
        if($sqlquery){
            header('location:adminCricketBoard.php');
        }
    }
?>