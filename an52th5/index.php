<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $_SESSION["qwq"]=0;
    header("location:login.php");
?>