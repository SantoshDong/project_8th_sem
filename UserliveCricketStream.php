<?php
    $id=$_REQUEST['id'];
    $_SESSION['cricid']=$id;
    require_once 'header.php';
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
   <?php require 'navbar.php';?>
    <div style="margin:1vh 0vh">
        <a style="width:100%;display:block;color:black;text-align:left;text-decoration:none" href="cricketMatchInfo.php"><span style="background:lightblue;border:1px solid black;padding:.5vh;border-radius:10%;"> Go Back to match list</span></a>
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
            $result = mysqli_query($conn, "SELECT * FROM matchinfo where id=$id ");
            if($result){
                if(mysqli_num_rows($result)>0){
                while($news = mysqli_fetch_assoc($result)){
                    $_SESSION['circiteamA'] = $news['teamA'];
                    $_SESSION['circiteamB'] = $news['teamB'];
                //print_r($news); ?>
                <div class="wrap_games">
                    <div class="wrap_match_list">
                        <div class="LeftTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image1'];?>">
                            <h6 id="teamARun" style="width:100%;display:block;text-align:center;"><?php echo $news['runA']."/".$news['wicketA'];?></h6>
                            <h5 class="TeamName"><?php echo $news['teamA'];?></h5>
                        </div>
                    
                        <div class="RightTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image2'];?>">
                            <h6 id="teamBRun" style="width:100%;display:block;text-align:center;"><?php echo $news['runB']."/".$news['wicketB'];?></h6>
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
            <div id="home" class="container tab-pane active" style="margin-bottom:5vh;"><br>
                <?php
                    require_once 'crickettxtautorefresh.php';
                ?>
            </div>

            <div id="menu1" class="container tab-pane fade" style="margin-bottom:5vh;"><br>
            <?php
                //fetch player and their data related to each team
                require_once 'userCricetBoard.php';
            ?>
            </div>

            <div id="menu2" class="container tab-pane fade" style="margin-bottom:5vh;"><br>
            <table>
            <tr>
                <th>stadium</th>
                <th>main umpire</th>
                <th>leg umpire</th>
                <th>third umpire</th>
                <th>man of the match</th>
            </tr>
            <tr>
            <?php
                    echo "<td>" .$news['stadium']."</td>";
                    echo "<td>".$news['umpire1']."</td>";
                    echo "<td>" .$news['umpire2']."</td>";
                    echo "<td>".$news['umpire3']."</td>";
                    echo "<td>".$news['mom']."</td>";

                ?>
            </tr>
            </table>
            </div>
        </div>
     </div>
            <?php
            }}}
            ?>
    </div>
</body>
</html>