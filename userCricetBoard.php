<html>
<head>
<title></title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="cricsummary">
<?php
     $conn = new mysqli('localhost', 'root', '', 'sportstime');
     // Check connection
     $id=$_SESSION['cricid'];
     $teamA = $_SESSION['circiteamA'];
     $teamB =$_SESSION['circiteamB'];
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
    //first inning record
    $sql = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$teamA'");?>
    <h3><?php echo $teamA;?> Batsmen</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Run</th>
            <th>4s</th>
            <th>6s</th>
            <th>Ball Face</th>
            <th>Status</th>
        </tr>
    <?php
    if($sql){
        if(mysqli_num_rows($sql)>0){
        while($batplayer1 = mysqli_fetch_assoc($sql)){
            //print_r($batplayer1);?>
        <!--print_r($news1);-->
            <tr>
                <td><?php echo $batplayer1['name'];?></td>
                <td><?php echo $batplayer1['run'];?></td>
                <td><?php echo $batplayer1['fours'];?></td>
                <td><?php echo $batplayer1['sixes'];?></td>
                <td><?php echo $batplayer1['ballface'];?></td>
                <td><?php if($batplayer1['batplay']==0){ echo "Not bat";}
                    else if($batplayer1['batplay']==1){ echo "Not out";}
                    else{ echo "Out";}?></td>
            </tr>    
    <?php
    }}}
    ?>
    </table>
    <?php
    $sqlquery = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$teamB'");?>
    <h3><?php echo $teamB;?> Baller</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Over</th>
            <th>Run</th>
            <th>4s</th>
            <th>6s</th>
            <th>Status</th>
        </tr>
    <?php
    if($sqlquery){
        if(mysqli_num_rows($sqlquery)>0){
        while($ballplayer1 = mysqli_fetch_assoc($sqlquery)){
            //print_r($ballplayer1);?>
        <!--print_r($news1);-->
        <tr>
            <td><?php echo $ballplayer1['name'];?></td>
            <td><?php echo $ballplayer1['bover'];?></td>
            <td><?php echo $ballplayer1['brun'];?></td>
            <td><?php echo $ballplayer1['bfour'];?></td>
            <td><?php echo $ballplayer1['bsixes'];?></td>
            <td><?php if($ballplayer1['ballplay']==0){ echo "Not balling";}
                    else if($ballplayer1['ballplay']==1){ echo "Balling";}
                    else{ echo "All over Completed";}?></td>
        </tr>    
    <?php
    }}}
    ?>    
    </table>
    
    <!--second innig record-->
    <?php
    $sql1 = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$teamB'");?>
    <h3><?php echo $teamB;?> Batsmen</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Run</th>
            <th>4s</th>
            <th>6s</th>
            <th>Ball Face</th>
            <th>Status</th>
        </tr>
    <?php
    if($sql1){
        if(mysqli_num_rows($sql1)>0){
        while($batplayer12 = mysqli_fetch_assoc($sql1)){
            //print_r($batplayer1);?>
        <!--print_r($news1);-->
            <tr>
                <td><?php echo $batplayer12['name'];?></td>
                <td><?php echo $batplayer12['run'];?></td>
                <td><?php echo $batplayer12['fours'];?></td>
                <td><?php echo $batplayer12['sixes'];?></td>
                <td><?php echo $batplayer12['ballface'];?></td>
                <td><?php if($batplayer12['batplay']==0){ echo "Not bat";}
                    else if($batplayer12['batplay']==1){ echo "Batting";}
                    else{ echo "Out";}?></td>
            </tr>    
    <?php
    }}}
    ?>
    </table>

    <?php
    $sqlquery1 = mysqli_query($conn, "SELECT * FROM cricketplayer where matchno='$id' AND team='$teamA'");?>
    <h3><?php echo $teamA;?> Baller</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Over</th>
            <th>Run</th>
            <th>4s</th>
            <th>6s</th>
            <th>Status</th>
        </tr>
    <?php
    if($sqlquery1){
        if(mysqli_num_rows($sqlquery1)>0){
        while($ballplayer12 = mysqli_fetch_assoc($sqlquery1)){
            //print_r($ballplayer1);?>
        <!--print_r($news1);-->
        <tr>
            <td><?php echo $ballplayer12['name'];?></td>
            <td><?php echo $ballplayer12['bover'];?></td>
            <td><?php echo $ballplayer12['brun'];?></td>
            <td><?php echo $ballplayer12['bfour'];?></td>
            <td><?php echo $ballplayer12['bsixes'];?></td>
            <td><?php if($ballplayer12['ballplay']==0){ echo "Not balling";}
                    else if($ballplayer12['ballplay']==1){ echo "Balling";}
                    else{ echo "All over Completed";}?></td>
        </tr>    
    <?php
    }}}
    ?>    
    </table>


    </div>
    <script type="text/javascript">
        setInterval("my_function();",5000); 
        function my_function(){
      $('#cricsummary').load(location.href + ' #cricsummary');
      $('#crictxtrefresh').load(location.href + ' #crictxtrefresh');
      $('#teamARun').load(location.href + ' #teamARun');
      $('#teamBRun').load(location.href + ' #teamBRun');
    }
  </script>
</body>
</html>