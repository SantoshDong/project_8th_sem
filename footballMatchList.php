<?php require_once 'header.php'?>
    <title>Nepal's Football Match List</title>
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

$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT id, teamA ,image1,teamB,image2 FROM footballmatchinfo ORDER BY id DESC ");
if($result){
    if(mysqli_num_rows($result)>0){
        
        while($news = mysqli_fetch_assoc($result)){
           // print_r($news); 
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
        <span class="stream_match"><a href="livefootballStream.php?id=<?php echo $news['id'];?>"><button style="padding:.5rem 1rem!important;"type="button">stream</button></a></span>
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