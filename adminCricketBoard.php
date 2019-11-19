<?php
    session_start();
    require_once 'header.php';
    require_once 'adminCricketHeader.php';
    $batting = $_SESSION['1stbatting'];
    $balling = $_SESSION['1stballing'];
    $id = $_SESSION['id'];
    echo "Batting team :- ".$batting."<br>"." Balling team:- ".$balling."<br>Match no:-".$id;
?>

</head>

<body>
<div style="background-color: #091c61;color:white;padding:.1em;">
    <h3 style="width:100%;text-align:center"><?php echo "This is the ".$_SESSION['inning']." inning of the match";?>
    </h3>
</div>
    <div style="margin-bottom:1em!important" class="row">
        <div class="col-sm-12 col-md-6">
            <table>
                <tr>
                    <th>Batsmen</th>
                    <th>Dotball</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>6</th>
                    <th>out</th>
                </tr>
                <?php
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    $result = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$batting' AND batplay=1");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $news['name'];?></td>
                    <td><a href="dotball.php?id=<?php echo $news['id'];?> && dot=1 ">Dot</a></td>
                    <td><a href="onerun.php?id=<?php echo $news['id'];?> && run=1 ">1 Run</a></td>
                    <td><a href="tworun.php?id=<?php echo $news['id'];?> && run=2 ">2 Run</a></td>
                    <td><a href="threerun.php?id=<?php echo $news['id'];?> && run=3 ">3 Run</a></td>
                    <td><a href="fourrun.php?id=<?php echo $news['id'];?> && run=4 ">4 Run</a></td>
                    <td><a href="sixrun.php?id=<?php echo $news['id'];?> && run=6 ">6 Run</a></td>
                    <td><a href="batsmanout.php?id=<?php echo $news['id'];?> && play=2 ">Out</a></td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>
        <!--closing of wrap_current_batting_pair -->

        <div class="col-sm-12 col-md-3">
            <table>
                <tr>
                    <th>Batsmen</th>
                    <th>IN</th>
                </tr>
                <?php
    $result = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$batting' AND batplay=0");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $news['name'];?></td>
                    <td><a style="width:100%;display:block;text-align:center"
                            href="nextbatsman.php?id=<?php echo $news['id'];?> && play=1 ">IN</a></td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>
        <!--closing of wrap_next_batting_players -->
        <div class="col-md-3 col-sm-12">
            <table>
                <tr>
                    <th>Batsmen</th>
                    <th>out</th>
                </tr>
                <?php
    $result1 = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$batting' AND batplay=2");
    if($result1){
        if(mysqli_num_rows($result1)>0){    
            while($news1 = mysqli_fetch_assoc($result1)){
                ?>
                <tr>
                    <td><?php echo $news1['name'];?></td>
                    <td style="display:block;width:100%;text-align:center">YES</td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>
    </div>
        <!--closing of wrap_out_player -->
    <!--wrap_1st_inning -->
    <div class="row" style="margin-bottom:1em!important;">
        <div class="col-sm-12 col-md-6">
            <table>
                <tr>
                    <th>Baller</th>
                    <th>Dotball</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>6</th>
                    <th>Wide/No ball</th>
                    <th>OverCompleted</th>
                    <th>All Over Completed</th>
                </tr>
                <?php
    $result = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$balling' AND ballplay=1");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $news['name'];?></td>
                    <td><a href="ballerDotball.php?id=<?php echo $news['id'];?> && dot=1">Dot</a></td>
                    <td><a href="ballerRun.php?id=<?php echo $news['id'];?> && run=1">1</a></td>
                    <td><a href="ballerRun.php?id=<?php echo $news['id'];?> && run=2">2</a></td>
                    <td><a href="ballerRun.php?id=<?php echo $news['id'];?> && run=3">3</a></td>
                    <td><a href="ballerRun.php?id=<?php echo $news['id'];?> && run=4">4</a></td>
                    <td><a href="ballerRun.php?id=<?php echo $news['id'];?> && run=6">6</a></td>
                    <td><a href="#">Yes</a></td>
                    <td><a href="overComplete.php?id=<?php echo $news['id'];?> && play=0">Yes</a></td>
                    <td><a href="allOverFinish.php?id=<?php echo $news['id'];?> && play=2">Yes</a></td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>

        <!--closing of current baller-->
        <div class="col-sm-12 col-md-3">
            <table>
                <tr>
                    <th>Baller</th>
                    <th>In</th>
                </tr>
                <?php
    $result = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$balling' AND ballplay=0");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $news['name'];?></td>
                    <td><a style="width:100%;display:block;text-align:center"
                            href="nextballer.php?id=<?php echo $news['id'];?> && play=1 ">IN</a></td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>
        <!--closing of wrap_next_baller-->
        <div class="col-sm-12 col-md-3">
            <table>
                <tr>
                    <th>Baller</th>
                    <th>All Over Completed</th>
                </tr>
                <?php
    $result = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$balling' AND ballplay=2");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $news['name'];?></td>
                    <td>Yes</td>
                </tr>
                <?php
            }
        }
    }
    ?>
            </table>
        </div>
        <!--closing of wrap_Allover_completed_player -->
    </div>
    <!--closing of wrap_1st_inning_baller-->
    <a href="CricketSecondInning.php">Start Second Inning</a>
    <?php require_once 'footer.php';?>