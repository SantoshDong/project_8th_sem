<html>
<head>
<title></title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="score">
<?php
    //session_start();
     $conn = new mysqli('localhost', 'root', '', 'sportstime');
     // Check connection
     $id=$_SESSION['infoid'];
     $teamA=$_SESSION['userteamA'];
     $teamB=$_SESSION['userteamB'];
    // echo $_SESSION['userteamA'].$_SESSION['userteamB'];
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
     $result1 = mysqli_query($conn, "SELECT * FROM footballplayer where matchno=$id AND team='$teamA'");
     ?> <h3>Player Info of Team <?php echo $teamA;?></h3>
        <table>
            <tr>
                <th>Player</th>
                <th>Position</th>
                <th>Goal</th>
                <th>Yellow</th>
                <th>Red</th>
                <th>Playing Info</th>
            </tr>
    <?php
    if($result1){
        if(mysqli_num_rows($result1)>0){
        while($news1 = mysqli_fetch_assoc($result1)){
            //print_r($news1);?>
        <!--print_r($news1);-->
            <tr>
                <td><?php echo $news1['name'];?></td>
                <td><?php echo $news1['position'];?></td>
                <td><?php echo $news1['goal'];?></td>
                <td><?php echo $news1['yellow'];?></td>
                <td><?php echo $news1['red'];?></td>
                <td><?php
                if($news1['play']==0){echo "Not Play";}
                else if($news1['play']==1){echo "playing Player";}
                else {echo "Sub Out";}?></td>
            </tr>    
    <?php
    }}}
?>
</table>
</div>
<div id="teamb">
<?php
    //session_start();
     $conn = new mysqli('localhost', 'root', '', 'sportstime');
     // Check connection
     $id=$_SESSION['infoid'];
     $teamA=$_SESSION['userteamA'];
     $teamB=$_SESSION['userteamB'];
    // echo $_SESSION['userteamA'].$_SESSION['userteamB'];
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
     $result1 = mysqli_query($conn, "SELECT * FROM footballplayer where matchno=$id AND team='$teamB'");
     ?> <h3>Player Info of Team <?php echo $teamB;?></h3>
        <table>
            <tr>
                <th>Player</th>
                <th>Position</th>
                <th>Goal</th>
                <th>Yellow</th>
                <th>Red</th>
                <th>Playing Info</th>
            </tr>
    <?php
    if($result1){
        if(mysqli_num_rows($result1)>0){
        while($news1 = mysqli_fetch_assoc($result1)){
            //print_r($news1);?>
        <!--print_r($news1);-->
            <tr>
                <td><?php echo $news1['name'];?></td>
                <td><?php echo $news1['position'];?></td>
                <td><?php echo $news1['goal'];?></td>
                <td><?php echo $news1['yellow'];?></td>
                <td><?php echo $news1['red'];?></td>
                <td><?php
                if($news1['play']==0){echo "Not Play";}
                else if($news1['play']==1){echo "playing Player";}
                else {echo "Sub Out";}?></td>
            </tr>    
    <?php
    }}}
?>
    </table>
    </div>
    <script type="text/javascript">
        setInterval("my_function();",3000); 
        function my_function(){
      $('#score').load(location.href + ' #score');
      $('#teamb').load(location.href + ' #teamb');
      $('#summary').load(location.href + ' #summary');
      $('#TeamgoalA').load(location.href + ' #TeamgoalA');
      $('#TeamgoalB').load(location.href + ' #TeamgoalB');
    }
  </script>
</body>
</html>