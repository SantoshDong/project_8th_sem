<?php
    session_start();
    require_once 'header.php';
    require_once 'adminCricketHeader.php';
    $id = $_SESSION['id'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
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
            <div style="background-color: #091c61; padding:10px;color:white;">
        <h2 style="margin-bottom:0px;text-align:center;">Enter the man of the match</h2>
        </div>
        <form  style="width:50%;margin:0 auto;    background-color: #f2f2f2;" method="post">
        <select name="mom">
        <?php
        if($result){
            if(mysqli_num_rows($result)>0){    
                while($news = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?php echo $news['name'];?>"><?php echo $news['name'];?></option>
                    <?php 
                }
            }
        }
        ?>
        </select>
        <input type="submit" name="update" value="Submit"/>
        </form>
    <?php require_once 'footer.php';?>      