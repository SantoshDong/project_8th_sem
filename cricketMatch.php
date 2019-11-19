<?php
session_start();
require_once 'header.php';
require_once 'Admin_header.php';

?>
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   if (isset($_POST['Submit'])) {
    move_uploaded_file($_FILES["teamA_logo"]["tmp_name"],"clubLogo/" . $_FILES["teamA_logo"]["name"]);
    move_uploaded_file($_FILES["teamB_logo"]["tmp_name"],"clubLogo/" . $_FILES["teamB_logo"]["name"]);		
    $teamA=$_POST['teamA'];
    $teamB=$_POST['teamB'];
    $location1=$_FILES["teamA_logo"]["name"];
    $location2=$_FILES["teamB_logo"]["name"];
    $stadium=$_POST['venue'];
    $umpire1=$_POST['umpire1'];
    $umpire2=$_POST['umpire2'];
    $umpire3=$_POST['umpire3'];
    //echo $teamA."<br>".$teamB."<br>".$location1."<br>".$location2."<br>"
    //.$stadium."<br>".$umpire1."<br>".$umpire2."<br>".$umpire3."<br>";
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO matchinfo (teamA , image1 , teamB ,image2 , stadium , umpire1 , umpire2, umpire3)
        VALUES ('$teamA', '$location1', '$teamB','$location2','$stadium','$umpire1','$umpire2','$umpire3')";
        
        if ($conn->query($sql) === TRUE) {
            header('location:cricketMatchList.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        }
        ?>
        <div id="hero_cricketmatch" style="margin:2%;">
        <h2 style="text-align:center;text-transform:uppercase">update cricket news</h2>
    <form class="wrap_loginForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Create new match
        <input type = "text" name = "teamA" placeholder="Team A" required/>
        <input class="file" type="file" name="teamA_logo" required/>
        <input type = "text" name = "teamB" placeholder="Team A" required/>
        <input class="file" type="file" name="teamB_logo" required/>
        <input type="text" name="venue" placeholder="Stadium" required/>
        <input type="text" name="umpire1" placeholder="Main Umpire" required/>
        <input type="text" name="umpire2" placeholder="Leg Umpire" required/>
        <input type="text" name="umpire3" placeholder="Third Umpire" required/>
        <input type="submit" name="Submit" value="Publish">
        <h5><a href="cricketMatchList.php">Goto Match List</a></h5> 
    </form>
    </div>
    <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
    <?php require_once'footer.php';?>