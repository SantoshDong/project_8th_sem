
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC");
if($result){
    if(mysqli_num_rows($result)>0){
        
        while($news = mysqli_fetch_assoc($result)){
            //print_r($news);       
?>
<!--<div class="wrap_news">-->
<div class="col-md-4 wrap_whole_news">
        <div class="wrap_img">
           <img class="img-fluid" src="<?php echo "images/".$news['featureimg'];?>">
        </div>
        <div class="wrap_news">
        <span class="news_heading"><a href="moredetail.php?id='<?php echo $news['id'];?>'">
       Read More</a></span>
        </div>
        <div class="wrap_news2">
        <span><?php echo $news['Heading'];?></span>
        </div>
</div>
<?php
        }
    }
}
?>
                                             