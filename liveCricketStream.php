<?php require_once 'header.php';?>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>      
    <body>
    <div class="for-logo-wrap">
      <div class="for-logo1">
      </div>
      <div class="for-logo2">
      </div>
   </div>
        <?php
            session_start();
            $id = $_REQUEST['id'];
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM matchinfo where id = '$id'");
if($result){
    if(mysqli_num_rows($result)>0){
        
        while($news = mysqli_fetch_assoc($result)){
            //print_r($news); 
            $_SESSION['teamA']=$news['teamA']; 
            $_SESSION['teamB']=$news['teamB'];    
            $_SESSION['id']=$id;  
?>
<!--<div class="wrap_news">-->
<div class="wrap_games">
     <div class="wrap_match_list">
                        <div class="LeftTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image1'];?>">
                            <h5 class="TeamName"><?php echo $news['teamA'];?></h5>
                        </div>
                        <div class="middle_text">
                            <h1 style="margin:0px;">vs</h1>
                        </div>
                        <div class="RightTeam">
                            <img class="club_image" src="<?php echo "clubLogo/".$news['image2'];?>">
                            <h5 class="TeamName"><?php echo $news['teamB'];?></h5>
                        </div>
     </div>
     <div class="wrap_live_stream">
    <h4 style="border:1px solid black;text-align:center;text-transform:uppercase;border-radius:10%;"><a href="teamA_player.php">insert player</a>
        </div>
</div>
<?php
        }
    }
}
?>
 <div style="background:black;color:white;height:10vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
</body>
</html>                                         
    </body>
</html>