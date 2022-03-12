<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["users"];
    date_default_timezone_set('Asia/Taipei');
    $today=date('Y/m/d H:i:s');
    mysqli_query($db,"INSERT INTO `time`(`user`, `time`, `type`) VALUES ('$user','$today','登出')");
    header("location:index.php");
?>