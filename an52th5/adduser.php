<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $acc=$_POST["acc"];
    $pas=$_POST["pas"];
    $types=$_POST["types"];
    mysqli_query($db,"INSERT INTO `adminuser`( `user`, `password`, `type`) VALUES ('$acc','$pas','$types')");
    header("location:adminpage.php");
?>