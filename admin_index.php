<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<?php
    session_start();
    require_once 'header.html';
    echo "Welcome " . $_SESSION['Admin'];
?>
<div class="container">
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#addnews">News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#cricket">Cricket</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#football">Football</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="logout.php">Log Out</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="addnews" class="container tab-pane active"><br>
        <?php 
          require_once 'addnews.php';
          ?>
    </div>

    <div id="cricket" class="container tab-pane fade"><br>
        <?php
          require_once 'cricketMatch.php';
        ?>
    </div>

    <div id="football" class="container tab-pane fade"><br>
        <?php
            require_once 'football.php';
        ?>
    </div>

    <div id="logout" class="container tab-pane fade"><br>
        <?php
            require_once 'logout.php';
        ?>
    </div>

  </div>
</div>

</body>
</html>
