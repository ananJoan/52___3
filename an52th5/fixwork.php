<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $id=$_POST["id"];
        $a=$_POST["workname"];
        $b=$_POST["nows"];
        $c=$_POST["types"];
        $d=$_POST["starttime"];
        $e=$_POST["endtime"];
        $f=$_POST["content"];
        mysqli_query($db,"UPDATE `work` SET `works`='$a',`nows`='$b',`type`='$c',`starttime`='$d',`endtime`='$e',`content`='$f' WHERE `id` LIKE '$id'");
        header("location:userspage.php");
    }
?>