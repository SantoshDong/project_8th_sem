
<!DOCTYPE html>
<html>
    <head>
        <title>Sports News</title>
        <link rel="stylesheet" href="style.css">          
    </head>
    <body>
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM heroimage");
if($result){
    if(mysqli_num_rows($result)>0){
        
        while($news = mysqli_fetch_assoc($result)){
           // print_r($news);       
?>
<!--<div class="wrap_news">-->
    <div class="detail_wrap_img">
        <img class="feature_img" src="<?php echo "heroimage/".$news['cricket'];?>">
        <img class="feature_img" src="<?php echo "heroimage/".$news['football'];?>">
        </div>
    </div>
<?php
        }
    }
}
?>

</body>
</html>
                                             