<?php
    session_start();
    $id = $_SESSION['football_id'];
    require_once 'header.php';
    require_once 'footballHeader.php';
    //echo "This is live " .$id;
?>
<title>AdminLiveFootball</title>
</head>
<body>
<!--<div class="wrap_all_section">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Stream Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Update Scoreboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Update Matchinfo</a>
        </li>
    </ul>
-->
    <div class="tab-content">
    <div style="background-color: #091c61; padding:10px;color:white;">
        <h2 style="margin-bottom:0px;text-align:center;">Update the stream here</h2>
        </div>
        <div id="home" class="container tab-pane active"><br>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'sportstime');
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['streamFootball'])){
            $time=$_POST['time'];
            $summary=$_POST['summary'];
            $id=$_SESSION['football_id'];
            echo $time."<br>".$summary;
            $sql=mysqli_query($conn,"INSERT into footballsummary (time,summary,matchno) values ('$time','$summary','$id')");
            if($sql){
                echo"<script>"."alert('Streamed Successfully')"."</script>";
            }
        }
    ?>
    <form  style="width:50%;margin:0 auto;" method="post">
        <input type="number" name="time" min="0" step="0.01" placeholder="10.15">
        <input type="text" name="summary" placeholder="Saummary" required/>
        <input type="submit" name="streamFootball" value="stream">
    </form>
    </div><!--closing of home-->
    
   <!--     <div id="menu1" class="container tab-pane fade"><br>
            <?php
                //require_once 'footballScoreboard.php';
            ?>-->
        </div><!--closing of menu1-->
     <!--   <div id="menu2" class="container tab-pane fade"><br>
        <?php
          /*  $conn = new mysqli('localhost', 'root', '', 'sportstime');
             // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_POST['update'])){
                $mom = $_POST['mom'];
                echo $mom;
                $sqlquery =mysqli_query($conn,"UPDATE footballmatchinfo SET mom='$mom' WHERE id='$id'");
                if($sqlquery){
                    echo "<script>"."alert('Man of the match Updated')"."</script>";
                }
            }?>
            <?php
                $id=$_SESSION['football_id'];;
                $conn = new mysqli('localhost', 'root', '', 'sportstime');
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $result = mysqli_query($conn, "SELECT name FROM footballplayer where matchno='$id'");
            ?>
            <form method="post">
                <h3 style="width:100%;display:block;text-align:center;">Enter the man of the match</h3>
                <select name="mom">
                <?php
                if($result){
                    if(mysqli_num_rows($result)>0){    
                    while($news = mysqli_fetch_assoc($result)){
                    ?>
                <option value="<?php echo $news['name'];?>"><?php echo $news['name'];?></option>
                    <?php 
                    }}}*/
                    ?>
                </select>
                <input type="submit" name="update" value="Submit"/>
                </form>-->
        </div><!--closing of menu2-->
    </div><!--closing of tab-conent-->
</div><!--closing of wrap all section div-->
<?php require_once 'footer.php';?>