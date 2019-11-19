<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>
<html>
    <head>
    <title>Sports News</title>
        <link rel="stylesheet" href="style.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
  
<!--<div class="wrap_news">-->
    <div id="time" class="row">
        <?php require_once "refreshnews.php";?>
    </div>
    <div style="background:black;color:white;height:5vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
    <script type="text/javascript">
        setInterval("my_function();",5000); 
        function my_function(){
      $('#time').load(location.href + ' #time');
    }
  </script>
</body>
</html>
                                             