<?php
    session_start();
    require_once 'header.php';
?>
  <div class="for-logo-wrap">
      <div class="for-logo1">
      </div>
      <div class="for-logo2">
      </div>
   </div>
<?php
    if(isset($_POST['teamA'])){
        $_SESSION['1stbatting'] = $_SESSION['teamA'];
        $_SESSION['1stballing'] = $_SESSION['teamB'];
        $_SESSION['inning'] ="First";
        //echo "Batting team:-".$_SESSION['1stbatting']."<br>"."Balling Team:-".$_SESSION['1stballing'];
        header('location:adminLiveCricket.php');
    }
    if(isset($_POST['teamB'])){
        $_SESSION['1stbatting'] = $_SESSION['teamB'];
        $_SESSION['1stballing'] = $_SESSION['teamA'];
        //echo "Batting team:-".$_SESSION['1stbatting']."<br>"."Balling Team:-".$_SESSION['1stballing'];
        header('location:adminLiveCricket.php');
    }

?>
<h3 style="width:100%;display:block;text-align:center;background:#091c61;color:white;padding:5px;">Choose first batting team</h3>
<div class="wrap_game_type" style="width:20%;margin:0 auto;margin-top:1em;padding:1em;">
<form method="post">
    <input style="width:100%;" type="submit" name="teamA" value="<?php echo $_SESSION['teamA'];?>"/><br><hr>
    <input style="width:100%;"  type="submit" name="teamB" value="<?php echo $_SESSION['teamB'];?>"/>

</form>
<div style="background:black;color:white;height:10vh;" class="fixed-bottom">
      <h4 style="text-align:center;">sportsnepal.com,copyright&copy2019</h4>
</div>
<?php require_once 'footer.php';?>