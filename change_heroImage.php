<!DOCTYPE html>
<head>
        <title>Add New </title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   if (isset($_POST['Submit'])) {
    move_uploaded_file($_FILES["cricketimage"]["tmp_name"],"heroimage/" . $_FILES["cricketimage"]["name"]);		
    move_uploaded_file($_FILES["cricketimage"]["tmp_name"],"heroimage/" . $_FILES["cricketimage"]["name"]);
    $location1=$_FILES["cricketimage"]["name"];
    $location2=$_FILES["footballimage"]["name"];
    echo $locations."<br/>".$heading."<br/>".$detail;
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO heroimage (cricket,football)
        VALUES ('$location1', '$location2')";
        if ($conn->query($sql) === TRUE) {
            header('location:hero_image_list.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
        ?>
    <form class="wrap_loginForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Choose for Cricket<input type = "file" name = "cricketimage">
        Choose for Football<input type = "file" name = "footballimage">
        <input type="submit" name="Submit" value="Publish"> 
    </form>
</body>
</html>