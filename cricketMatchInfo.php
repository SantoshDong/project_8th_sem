<?php
    require_once 'header.php';
?>
<title>cricket home</title>
</head>

<body data-spy="scroll" data-target="#navbarMenu">
    <?php require_once 'navbar.php';?>
<div class="Hero_image_cricket">
        <?php
       require 'db_connect.php';
      $query =  "SELECT * FROM forfile2 ORDER BY id DESC LIMIT 1";
     // $row=mysql_fetch_array($query);
     $result=mysqli_query($conn,$query);
    $posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
     <?php foreach($posts as $post) : ?>
        <div class="row for-hero" style="">
            <img class="cricket-hero-image"  src="./images/<?php echo $post['image1']?>" alt="">
        </div>
        <?php endforeach;?>
</div>

    <div>
        <div style="background-color: #091c61; padding:10px;color:white;">
        <h2 style="margin-bottom:0px">Nepal cricket Match List</h2>
        </div>
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
                //print_r($news); 
        ?>
            <div class="wrap_games">
                <div class="wrap_match_list">
                    <div class="LeftTeam">
                        <img class="club_image" src="<?php echo "clubLogo/".$news['image1'];?>">
                        <h5 class="TeamName"><?php echo $news['teamA'];?></h5>
                    </div>
                    <div class="middle_text">
                        <h1>vs</h1>
                    </div>
                    <div class="RightTeam">
                        <img class="club_image" src="<?php echo "clubLogo/".$news['image2'];?>">
                        <h5 class="TeamName"><?php echo $news['teamB'];?></h5>
                    </div>
                </div>

                <div class="wrap_live_stream">
                    <span class="stream_match"><a href="UserliveCricketStream.php?id=<?php echo $news['id'];?>">
                           <button type="button">Watch</button></a></span>
                </div>
            </div>
            <?php
        }
    }
}
?>
    </div>
    <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
<?php require_once 'footer.php';?>