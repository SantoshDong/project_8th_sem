<?php require_once 'header.php';?>
    <title>extra2</title>
</head>
<body>
<div class="for-logo-wrap">
      <div class="for-logo1">
      </div>
      <div class="for-logo2">
      </div>
   </div>
<?php
    session_start();
    //echo $_SESSION['id'];
    //echo $_SESSION['teamA'];
    //echo $_SESSION['teamB'];
    $conn = new mysqli('localhost', 'root', '', 'sportstime');
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['t20'])){
        $_SESSION['over'] =19;
        $id= $_SESSION['id'];
        $summary = "game begin";
        //echo $_SESSION['over'];
        $query=mysqli_query($conn,"INSERT INTO cricketsummary ( `over`, `ball`, `summary`, `matchno`)
        VALUES ('$over', '$ball', '$summary', '$id')");
        if($query){header('location:chooseIning.php');}
    }
    if(isset($_POST['ODI'])){
        $_SESSION['over'] =49;
        $id= $_SESSION['id'];
        //echo $_SESSION['over'];
       
        $query=mysqli_query($conn,"INSERT INTO cricketsummary ( `over`, `ball`, `summary`, `matchno`)
        VALUES ('$over', '$ball', '$summary', '$id')");
        if($query){header('location:chooseIning.php');}

    }
?>
<div style="background-color: #091c61; padding:10px;color:white;">
        <h2 style="margin-bottom:0px">Choose game type</h2>
        </div>

<div class="wrap_game_type" style="width:20%;margin:0 auto;margin-top:1em;padding:1em;">
    <form method="post">
        <input style="width:100%;" class="t20" type="submit" name="t20" value="T-20"><br><hr>
        <input style="width:100%;" class="odi" type="submit" name="ODI" value="ODI">
    </form>
</div>
<?php require_once'footer.php';?>