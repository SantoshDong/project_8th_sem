<?php require 'header.php';?>
<title>feedback</title>
</head>

<body data-spy="scroll" data-target="#navbarMenu" style="overflow:hidden;">

  <?php require 'navbar.php';?>
  <?php
// define variables and set to empty values
$nameErr = $emailErr = $commentErr = $websiteErr = "";
$name1 = $email1  = $comment1 = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }else{
        $name1=$_POST["name"];
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }else{
        $email1=$_POST["email"];
    }
  }
  if (empty($_POST["comment"])) {
    $commentErr = "Comment is required";
  } else {
    $comment = $_POST["comment"];
    // check if e-mail address is well-formed
    if (!filter_var($comment)) {
      $commentErr = "Invalid comment";
    }else{
        $comment1=$_POST["comment"];
    }
  }
 
  if(!empty($name1) && !empty($email1) && !empty($comment1)){
  require 'db_connect.php';
  $query="INSERT INTO feedback (name,email,comment) VALUES ('$name1','$email1','$comment1')";
  if(mysqli_query($conn,$query)){
    header('Location: http://localhost/8thsem/thank.php');
  }else{
      echo "failed:".mysqli_error($conn);
  }
}
}

?>
  <div class="form-wrapper" style="padding:10px;width:80%;margin:0 auto;height:105vh;">
    <div style="background-color: #091c61; padding:10px;color:white;">
      <h2 style="margin-bottom:0px">Send your feedback</h2>
    </div>
    <div clsss="feedback-form" style="display:block;">
    <p><span class="error"></span></p>
    <form style="border:1px solid gray;padding:10px;border-radius:10px;background: rgba(26,155,148,0.11);" method="post"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name: <input type="text" name="name" value="<?php echo $name1;?>" />
      <span class="error"> <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo $email1;?>" />
      <span class="error"><?php echo $emailErr;?></span>
      <br><br>
      Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment1;?>"></textarea>
      <span class="error"><?php echo $commentErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    </div>
  </div>
  <div style="content:'';margin-top:1em;margin-bottom:1em;">
  </div>
  <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div> 
  <?php require'footer.php'?>
  