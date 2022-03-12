<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $pas=$_POST["pas"];
    $types=$_POST["types"];
    $id=$_POST["id"];
    mysqli_query($db,"UPDATE `adminuser` SET `password`='$pas',`type`='$types' WHERE `id` LIKE '$id'");
    header("location:adminpage.php");
?>