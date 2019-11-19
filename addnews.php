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
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);		

    $locations=$_FILES["image"]["name"];
    $heading=$_POST['heading'];
    $detail = $_POST['detail'];
    //echo $locations."<br/>".$heading."<br/>".$detail;
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO news (featureimg,Heading,detail)
        VALUES ('$locations', '$heading', '$detail')";
        
        if ($conn->query($sql) === TRUE) {
            //header('location:news.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        }
        ?>
  
   <div id="hero_addimage" style="margin:3%;">
   <h2 style="text-align:center;text-transform:uppercase">update news here</h2>
    <form class="wrap_loginForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input class="file" type = "file" name = "image" required/><br/>
        <input type="text" name="heading" placeholder="Heading" required/>
        <textarea  rows="5" cols="40" name="detail" placeholder="Detail"  required></textarea>
        <input type="submit" name="Submit" value="Publish"> 
    </form>
    </div>
    <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>  
    <?php require_once 'footer.php';?>
    