<?php
    session_start();

    $teamA = $_SESSION['football_teamA'];
    $teamB = $_SESSION['football_teamB'];
    $id = $_SESSION['football_id'];
    require_once 'header.php';
    require_once 'footballHeader.php';
?>
<title>ScoreBoard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-bottom:1em!important" class="row">
        <div class="col-sm-12 col-md-4">
<?php
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    ?>
    <!-- Team A playing XI player-->
    <span style="width:100%;display:block;text-align:center"><?php echo "Team ".$teamA." playing Player";?></span>
    <table>
    <tr>
    <th>Name</th>
    <th>Position</th>
    <th>Goal</th>
    <th>Yellow</th>
    <th>Red</th>
    <th>Out</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM footballplayer where matchno='$id' AND team='$teamA' AND play='1' AND red='0'");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
            //print_r($news);?>
            <tr>
            <td><?php echo $news['name'];?></td>
            <td><?php echo $news['position'];?></td>
            <td><a href="footballPlayergoal.php?id=<?php echo $news['id'];?> && goal=1">Goal</a></td>
            <td><a href="footballPlayeryellow.php?id=<?php echo $news['id'];?> && yellow=1">Yellow</a></td>
            <td><a href="footballPlayerred.php?id=<?php echo $news['id'];?> && red=1">Red</a></td>
            <td><a href="footballPlayerOut.php?id=<?php echo $news['id'];?> && out=2">Out</a></td>
            </tr>
            <?php
        }
        }
    }?>
    </table>
    </div><!--closing of teamA_table_playing-->
    <div class="col-sm-12 col-md-4">
    <!--Team A substitue player list-->
        <span style="width:100%;display:block;text-align:center">Substitue player</span>
    <table>
    <tr>
    <th>Name</th>
    <th>Position</th>
    <th>In</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM footballplayer where matchno='$id' AND team='$teamA' AND play='0'");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
            //print_r($news);?>
            <tr>
            <td><?php echo $news['name'];?></td>
            <td><?php echo $news['position'];?></td>
            <td><a href="footballPlayerIn.php?id=<?php echo $news['id'];?> && in=1">IN</a></td>
            </tr>
            <?php
        }
        }
    }?>
    </table>
    </div><!--closing of wrap_teamA_sub_player-->
    <!--Team A red card player-->
    <div class="col-sm-12 col-md-4">
    <span style="width:100%;display:block;text-align:center">Red Card and Substitute out players</span>
    <table>
    <tr>
    <th>Name</th>
    <th>Team</th>
    <th>Red</th>
    <th>Out</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM footballplayer where matchno='$id'  AND play='2' OR red='1'");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
            //print_r($news);?>
            <tr>
            <td><?php echo $news['name'];?></td>
            <td><?php echo $news['team'];?></td>
            <td><?php if($news['red']==1){ echo "yes";}else{ echo "-";}?></td>
            <td><?php if($news['play']==2){ echo "yes";}?></td>
            </tr>
            <?php
        }
        }
    }?>
    </table>
    </div><!--closing of wrap_teamA_red_and_out_player-->
</div><!--closing of wrap_teamA-->
<!-- Team B player -->
<div class="row">
<div class="col-md-6 col-sm-12">
    <span style="width:100%;display:block;text-align:center"><?php echo "Team ".$teamB." playing Player";?></span>
    <table>
    <tr>
    <th>Name</th>
    <th>Position</th>
    <th>Goal</th>
    <th>Yellow</th>
    <th>Red</th>
    <th>Out</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM footballplayer where matchno='$id' AND team='$teamB' AND play='1' AND red='0'");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
            //print_r($news);?>
            <tr>
            <td><?php echo $news['name'];?></td>
            <td><?php echo $news['position'];?></td>
            <td><a href="footballPlayergoal.php?id=<?php echo $news['id'];?> && goal=1">Goal</a></td>
            <td><a href="footballPlayeryellow.php?id=<?php echo $news['id'];?> && yellow=1">Yellow</a></td>
            <td><a href="footballPlayerred.php?id=<?php echo $news['id'];?> && red=1">Red</a></td>
            <td><a href="footballPlayerOut.php?id=<?php echo $news['id'];?> && out=2">Out</a></td>
            </tr>
            <?php
        }
        }
    }?>
    </table>
    </div><!--closing of teamB_table_playing-->

    <!--Team B substitue player list-->
    <div class="col-sm-12 col-md-6">
        <span style="width:100%;display:block;text-align:center">Substitue player</span>
    <table>
    <tr>
    <th>Name</th>
    <th>Position</th>
    <th>In</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM footballplayer where matchno='$id' AND team='$teamB' AND play='0'");
    if($result){
        if(mysqli_num_rows($result)>0){    
            while($news = mysqli_fetch_assoc($result)){
            //print_r($news);?>
            <tr>
            <td><?php echo $news['name'];?></td>
            <td><?php echo $news['position'];?></td>
            <td><a href="apple.php?id=<?php echo $news['id'];?> && in=1">IN</a></td>
            </tr>
            <?php
        }
        }
    }?>
    </table>
    </div><!--closing of wrap_teamB_sub_player-->
</div><!--closing of wrap_teamB-->
</body>
</html>