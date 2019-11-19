<?php
    $id=$_REQUEST['id'];
    require_once 'header.php';
?>
        <title>more detail</title>  
    </head>
    <body data-spy="scroll" data-target="#navbarMenu" style="height:100vh;">
    <?php require_once 'navbar.php';?>
<?php
$conn = new mysqli('localhost', 'root', '', 'sportstime');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM news where id=$id");
if($result){
    if(mysqli_num_rows($result)>0){
        
        while($news = mysqli_fetch_assoc($result)){
           // print_r($news);       
?>
<!--<div class="wrap_news">-->
    <div class="row" style="margin-bottom:5vh!important;">
    <div class="detail_wrap_img" style="height:auto;">
        <div style="width:90%;margin:0 auto;height:80vh;overflow-x:hidden;">
        <span class="news_heading"><?php echo $news['Heading'];?></a></span>
        <img class="feature_img img-fluid" src="<?php echo "images/".$news['featureimg'];?>">
        </div>
        <div class="news_detail"><?php echo $news['detail'];?>
        </div>
        <div style="width:10%;margin:0 auto;"><a class="back" href="news.php"><button type="button">back</button></a>
       </div>
      
    </div>
    </div>
<?php
        }
    }
}
?>
<?php require_once "footer.php";?>                                             