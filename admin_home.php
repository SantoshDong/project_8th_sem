<?php
    session_start();
    require_once 'header.php';
        require_once 'Admin_header.php';
        ?>   
    <?php
require 'db_connect.php';
$query="SELECT * FROM feedback ORDER BY id DESC";
$result=mysqli_query($conn,$query);
$posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);
mysqli_free_result($result);
mysqli_close($conn);
require 'db_connect.php';
 if(isset($_POST['submit1'])){
      $file=$_FILES['file']['name'];
      $temp_name=$_FILES['file']['tmp_name'];
      $path="./images/".$file;
      move_uploaded_file($temp_name,$path)  ;
      $query="INSERT INTO forfile (image) VALUES('$file')";
      
     if (mysqli_query($conn, $query)) {
      header('Location: http://localhost/8thsem/admin_home.php');
      //$last_id = mysqli_insert_id($conn);
     // echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
   }
   require 'db_connect.php';
   if(isset($_POST['submit2'])){
    $file=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $path="./images/".$file;
    move_uploaded_file($temp_name,$path);
    $query="INSERT INTO forfile2 (image1) VALUES('$file')";
    
   if (mysqli_query($conn,$query)) {
    header('Location: http://localhost/8thsem/admin_home.php');
    //$last_id = mysqli_insert_id($conn);
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
 }
?>
<?php 
 require 'db_connect.php';
 if(isset($_POST['delete'])){
     $delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
     $query= "DELETE FROM feedback WHERE id={$delete_id}";
             if(mysqli_query($conn,$query)){
                 /* This will give an error. Note the output
                  * above, which is before the header() call */
                 header('Location: http://localhost/8thsem/admin_home.php');
                 exit;
                 
             }else{
                 echo "error".mysqli_error($conn);
             }
             mysqli_close($conn);

 }
?>
<div class="row">
    <div class="col-sm-12"><h2><span style="background:lightblue;"><?php echo "Hello " . $_SESSION['Admin'];?></span></h2></div>
</div>

    <div class="row">
        <div class="col-sm-6 add-football-hero">
            <h2 class="football-head" style="text-align:center;"> ADD HERO IMAGE FOR FOOTBALL</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data' style="padding:.5em;">
                <input class="file" type='file' name='file' required><br>
                <button class="button" type='submit' value='Save name' name='submit1'>SAVE</button>
            </form>
        </div><br>
        <div class="col-sm-6 add-cricket-hero">
            <h2 style="text-align:center;">ADD HERO IMAGE FOR CRICKET</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data' style="padding:.5em;">
                <input class="file" type='file' name='file' required><br>
                <button class="button" type='submit' value='Save name' name='submit2'>SAVE</button>
            </form>
        </div>
    </div>
    <h1 style="text-align:center;background-color: #091c61; padding:5px;color:white;">Feedback form user</h1>
<div class="row" style="color:white;margin-bottom:5vh!important;">
<?php foreach($posts as $post) :?>
<div class="col-sm-6 col-lg-4" style="border:1px solid white;font-size:1.5rem;padding:.5em;background-color:gray;">
            <?php echo 'Name: '.$post['name'];?><br>
            <?php echo 'Email: '.$post['email'];?><br>
            <?php echo 'Comment: '.$post['comment'];?><br> 
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
          <div class="feedback-delete">
               <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
               <input type="submit" name="delete" value="delete">
          </div>
         </form>
 
            </div>  
<?php endforeach;?>
<br>
</div>
    </div>
    <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright©2019</h4>
</div>
    <?php require_once'footer.php';?>