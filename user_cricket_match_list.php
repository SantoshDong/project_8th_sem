<html>
<head>
    <title>Nepal's Cricket Match List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT id, teamA ,image1,teamB,image2 FROM matchinfo ORDER BY id DESC ");
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
    <div class="RightTeam">
        <img class="club_image" src="<?php echo "clubLogo/".$news['image2'];?>">
        <h5 class="TeamName"><?php echo $news['teamB'];?></h5>
    </div>
    </div>
    <div class="wrap_live_stream">
        <span class="stream_match"><a href="UserliveCricketStream.php?id=<?php echo $news['id'];?>">Stream</a></span>
    </div>
</div>
<?php
        }
    }
}
?>
</body>
</html>                                         