<?php require "db_connect.php";?>
<?php
    $query="SELECT * FROM login ORDER BY created_at DESC";
    $result=mysqli_query($conn,$query);
    $posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);
    mysqli_free_result($result);
    mysqli_close($conn);
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
</head>
<body>
    <h1>posts</h1>
    <div class="for-back">
             <button type="submit" name="back"><a href="http://localhost/project_db/index.php">back</a>
         </div>
    <?php foreach($posts as $post) : ?>
         <div class="for-post" style="background-color:gray;width:50%;color:white;">
         <h3><?php echo $post['name']?></h3>
         <h3><?php echo $post['email']?></h3>
         <h3><?php echo $post['created_at']?></h3>
         <button type="submit" name="read"><a class="btn btn-default" href="post.php?id=<?php echo $post['id'];?>">read more</a></button>
         <button type="submit" name="update"><a href="http://localhost/project_db/update.php?id=<?php echo $post['id'];?>">update</a></button>
         <button type="submit" name="delete"><a class="btn btn-default" href="post.php?id=<?php echo $post['id'];?>">delete</a></button>

         </div>
    <?php endforeach;?>
</body>
</html>