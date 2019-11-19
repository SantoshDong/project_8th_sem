<?php require'header.php';?>
<?php
require 'db_connect2.php';
$query="SELECT * FROM feedback ORDER BY created_at DESC";
$result=mysqli_query($conn,$query);
$posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<h1 style="text-align:center;">Feedback form user</h1>
<div class="row" style="background-color:gray;color:white;">
<?php foreach($posts as $post) :?>
<div class="col-sm-6 col-lg-3" style="border:1px solid white;">
            <?php echo $post['name'];?><br>
            <?php echo $post['email'];?><br>
            <?php echo $post['comment'];?><br>  
            </div>  
<?php endforeach;?>
<br>
</div>
</div>
<?php require'footer.php';?>