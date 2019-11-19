<?php
    session_start();
    require_once 'header.php';
    //echo $_SESSION['teamB'];
    //echo $_SESSION['id'];
?>
    <title>TeamB_player</title>
</head>
<body>
<div class="for-logo-wrap">
      <div class="for-logo1">
      </div>
      <div class="for-logo2">
      </div>
   </div>
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['Submit'])) {
$name=$_POST['playerName'];
$position = $_POST['position'];
$team = $_SESSION['teamB'];
$matchno = $_SESSION['id'];
//echo $name."<br/>".$position;
  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO cricketplayer (name,position,team,matchno)
    VALUES ('$name', '$position','$team','$matchno')";
    
    if ($conn->query($sql) === TRUE) {
        $q="select * from cricketplayer where team='$team' AND matchno='$matchno'";
        $res=mysqli_query($conn,$q);
        $a= mysqli_num_rows($res);
        echo "<br/>"."Enter".($a+1). "player Name";
        if($a==4){
            header('location:extra2.php');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    ?>
 <h1 style="text-align:center;"><span class="heading">Enter player of<span style="font-size:3rem;text-transform:uppercase;color:red;font-weight:900"> <?php echo $_SESSION['teamB'];?></span></span></h1>
<form style="width:50%;margin:0 auto; background: rgba(26,155,148,0.11);margin-top:5%;"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" name="playerName" placeholder="Player Full Name" required/>
    <input type="text" name="position" placeholder="position" required/>
    <input type="submit" name="Submit" value="Enter"/>
</form>
<div style="background:black;color:white;height:10vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
</body>
</html>