<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["users"];
    if(!empty($_POST)){
        $a=$_POST["works"];
        $b=$_POST["nows"];
        $c=$_POST["types"];
        $d=$_POST["starttime"];
        $e=$_POST["endtime"];
        $f=$_POST["content"];
        mysqli_query($db,"INSERT INTO `work`(`works`, `nows`, `type`, `starttime`, `endtime`, `content`, `user`) VALUES ('$a','$b','$c','$d','$e','$f','$user')");
        header("location:userspage.php");
    }
?>