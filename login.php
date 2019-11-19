<?php require_once 'header.php';?>
<link rel="stylesheet" type="text/css" href="./adminlogin.css">
<title>Admin login</title>
</head>
<body>
    <div class="for-logo-wrap">
      <div class="for-logo1">
      </div>
      <div class="for-logo2">
      </div>
   </div>
<div id="login_body">
    <h1 class="heading-admin-login">Admin login</h1>
<?php
        session_start();
        $error = "";
            if (isset($_POST['Submit'])) {
                $name=$_POST['name'];
                $password=$_POST['password'];
                $conn = new mysqli('localhost', 'root', '', 'sportstime');
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $result = mysqli_query($conn, "SELECT * FROM admin");
                if($result){
                if(mysqli_num_rows($result)>0){   
                while($news = mysqli_fetch_assoc($result)){
                   // print_r($news);   
                if($news['name']==$name && $news['PASSWORD']==$password){
                    $_SESSION['Admin']=$news['name'];
                    header('location:admin_home.php');
                }
                else {
                    $error ="Credential data did not match. PLease try again!!";
                }
            }
        }
    } 
    else {
        echo "no table found!!";
    }
}

?>
    <div class="wrap_loginForm">
        <div class="userLogo">
            <img class="userLogo__img" src="./images/user.png">
        </div>
            
        <div class="wrap_Form">
            <h5 style="color:red"><?php echo $error ?></h5>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="Name">
                    <input type="text" name="name" placeholder="Name" required/>
                </div>

                <div class="password">
                    <input type="password" name="password" placeholder="Password"required/>
                </div>

                <div class="Button">
                    <input type="submit" name="Submit" value="Login"/>
                </div>
                </form>
        </div>
    </div>
</div>
<?php require_once 'footer.php';