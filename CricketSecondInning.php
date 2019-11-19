<?php
    session_start();
    $balling = $_SESSION['1stbatting'];
    $batting = $_SESSION['1stballing'];

    $_SESSION['1stbatting'] = $batting;
    $_SESSION['1stballing'] = $balling;
    $_SESSION['inning'] = "Second";
    echo $_SESSION['1stbatting'].$_SESSION['1stballing'].$_SESSION['inning'];
    header('location:adminCricketBoard.php');
?>