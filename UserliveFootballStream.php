<?php
    $id=$_REQUEST['id'];
    session_start();
    $_SESSION['infoid']=$id;
    //echo $_SESSION['infoid'];
    require_once 'header.php';
?>
<html>
    <head>
        <title></title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php require_once 'navbar.php'?>
    <div  style="margin:1vh 0vh">
        <a style="width:100%;display:block;color:black;text-align:left;text-decoration:none" href="footballMatchInfo.php"><span style="background:lightblue;border:1px solid black;padding:.5vh;border-radius:10%;">go to match list</span></a></span>
    </div>

    <div class="first_part">
        <?php
            $conn = new mysqli('localhost', 'root', '', 'sportstime');
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            ?>
            <?php
            //fetch team related data
            $result = mysqli_query($conn, "SELECT * FROM footballmatchinfo where id=$id ");
            if($result){
                if(mysqli_num_rows($result)>0){
                while($news = mysqli_fetch_assoc($result)){
                    $_SESSION['userteamA'] = $news['teamA'];
                    $_SESSION['userteamB'] = $news['teamB'];
               // print_r($news);?>
                <div class="wrap_games">
                    <div class="wrap_match_list">
                        <div class="LeftTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image1'];?>">
                            <h3 id ="TeamgoalA" style="display:block;width:100%;text-align:center"><?php echo $news['goalA'];?></h3>
                            <h5 class="TeamName"><?php echo $news['teamA'];?></h5>
                        </div>
                    
                        <div class="RightTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image2'];?>">
                            <h3 id="TeamgoalB" style="display:block;width:100%;text-align:center"><?php echo $news['goalB']; ?></h3>
                            <h5 class="TeamName"><?php echo $news['teamB'];?></h5>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Summary</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Scoreboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Matchinfo</a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div id="home" class="container tab-pane active" style="margin-bottom:5vh;">
                        <?php
                            require_once 'footballtxtautorefresh.php';
                        ?>
                    </div>

                    <div id="menu1" class="container tab-pane fade" style="margin-bottom:5vh;">
                        <?php
                            require_once 'userFootballScore.php';
                        ?>
                    </div>

                    <div id="menu2" class="container tab-pane fade" style="margin-bottom:5vh;">
                    <table>
                        <tr>
                            <th>stadium</th>
                            <th>refree 1</th>
                            <th>refree 2</th>
                            <th>refree 3</th>
                            <th>refree 4</th>
                            <th>man of the match</th>
                        </tr>
                        <tr>
                    <?php
                    echo "<td>" .$news['stadium']."</td>";
                    echo "<td>".$news['refree1']."</td>";
                    echo "<td>" .$news['refree2']."</td>";
                    echo "<td>".$news['refree3']."</td>";
                    echo "<td>".$news['refree4']."</td>";
                    echo "<td>".$news['mom']."</td>";
                    ?>
                        </tr>
                      </table> 
                    </div> 
                </div>   
                <?php
            }}}?>
    </div>
</body>
</html>