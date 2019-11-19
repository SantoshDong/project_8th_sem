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
   if (isset($_POST['Submit34'])) {
    move_uploaded_file($_FILES["teamA_logo"]["tmp_name"],"clubLogo/" . $_FILES["teamA_logo"]["name"]);
    move_uploaded_file($_FILES["teamB_logo"]["tmp_name"],"clubLogo/" . $_FILES["teamB_logo"]["name"]);		
    $teamA=$_POST['teamA'];
    $teamB=$_POST['teamB'];
    $location1=$_FILES["teamA_logo"]["name"];
    $location2=$_FILES["teamB_logo"]["name"];
    $stadium=$_POST['venue'];
    $refree1=$_POST['refree1'];
    $refree2=$_POST['refree2'];
    $refree3=$_POST['refree3'];
    $refree4=$_POST['refree4'];
    //echo $teamA."<br>".$teamB."<br>".$location1."<br>".$location2."<br>"
    //.$stadium."<br>".$refree1."<br>".$refree2."<br>".$refree3."<br>";
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO footballmatchinfo (teamA , image1 , teamB ,image2 , stadium , refree1 , refree2, refree3,refree4)
        VALUES ('$teamA', '$location1', '$teamB','$location2','$stadium','$refree1','$refree2','$refree3','$refree4')";
        
        if ($conn->query($sql) === TRUE) {
            header('location:footballMatchList.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn1->close();
        }
        ?>
<div id="hero_adminfootball" style="margin:2%;margin-bottom:10vh;">
    <h2 style="text-align:center;text-transform:uppercase">update football news</h2>
    <form class="wrap_loginForm" enctype="multipart/form-data"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h5> Create new match</h5>
        <input type="text" name="teamA" placeholder="Team A" required />
        <input class="file" type="file" name="teamA_logo" required />
        <input type="text" name="teamB" placeholder="Team A" required />
        <input class="file" type="file" name="teamB_logo" required />
        <input type="text" name="venue" placeholder="Stadium" required />
        <input type="text" name="refree1" placeholder="Main refree" required />
        <input type="text" name="refree2" placeholder="Leg refree" required />
        <input type="text" name="refree3" placeholder="Third refree" required />
        <input type="text" name="refree4" placeholder="Third refree" required />
        <input type="submit" name="Submit34" value="Publish">
        <h5><a href="footballMatchList.php">Goto Match List</a></h5>
    </form>
</div>
<div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
<?php require_once'footer.php';?>