<?php
    session_start();
    $id = $_SESSION['id'];
    require_once 'header.php';
    require_once 'adminCricketHeader.php';
    /*echo "This is live";
    echo$_SESSION['over']."<br>";
    echo $_SESSION['teamA'].$_SESSION['teamB']."<br>";
    echo $_SESSION['id'];*/
?>
<title></title>
</head>
<body>
<div class="wrap_all_section">
    <!--<ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Stream Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Update Scoreboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Update Matchinfo</a>
        </li>
    </ul>-->

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
                $over=$_POST['over'];
                $ball=$_POST['Ball'];
                $summary=$_POST['summary'];
                $id=$_SESSION['id'];
                //echo $over.".".$ball."<br>".$summary;
                $query=mysqli_query($conn,"SELECT * from cricketsummary  where matchno=$id ORDER BY id DESC LIMIT 1"); 
                    if($info = mysqli_fetch_row($query)){
                        //print_r($info);
                        if($over==$info['1'] && $ball==$info['2']){
                            echo "Sorry this ball is already played";
                        }
                        else{
                           // echo "This ball is not recorded";
                            $query=mysqli_query($conn,"INSERT INTO cricketsummary ( `over`, `ball`, `summary`, `matchno`)
                             VALUES ('$over', '$ball', '$summary', '$id')");
                            if($query){
                                echo"<script>"."alert('Streamed Successfully')"."</script>";
                            }
                        }
                    }
                }
        ?>
        <form style="width:50%;margin:0 auto;" method="post">
            <input style="width:20%;" type="number" name="over" min="0" max="<?php echo $_SESSION['over'];?>" placeholder="Over" required>
            <input style="width:20%;" type="number" name="Ball" min="1" max="6" placeholder="Ball" required>
            <input type="text" name="summary" placeholder="Saummary" required/>
            <input type="submit" name="streamFootball" value="STREAM">
        </form>

        </div><!--closing of home-->
       <!-- <div id="menu1" class="container tab-pane fade"><br>
                <?php
                    //require_once 'adminCricketBoard.php';
                ?>
        </div>closing of menu1-->
        <!--<div id="menu2" class="container tab-pane fade"><br>
        <?php
            /*$conn = new mysqli('localhost', 'root', '', 'sportstime');
             // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_POST['update'])){
                $mom = $_POST['mom'];
                echo $mom;
                $sqlquery =mysqli_query($conn,"UPDATE matchinfo SET mom='$mom' WHERE id='$id'");
                if($sqlquery){
                    echo "<script>"."alert('Man of the match Updated')"."</script>";
                }
            }?>
            <?php
                $id=$_SESSION['id'];
                $conn = new mysqli('localhost', 'root', '', 'sportstime');
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $result = mysqli_query($conn, "SELECT name FROM cricketplayer where matchno='$id'");
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
                    }}}
                    */?>
                </select>
                <input type="submit" name="update" value="Submit"/>
                </form>
        </div>closing of menu2-->
    </div><!--closing of tab-conent-->
</div><!--closing of wrap all section div-->
<?php require_once'footer.php';?>