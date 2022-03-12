<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_POST["id"];
    $starttime=$_POST["starttime"];
    $offleft=$_POST["offleft"];
    $row=mysqli_query($db,"SELECT * FROM `work` WHERE `id` LIKE '$id'");
    $arr=mysqli_fetch_array($row);
    $endtime=$starttime+($arr[5]-$arr[4]);
    mysqli_query($db,"UPDATE `work` SET `starttime`='$starttime',`endtime`='$endtime',`offleft`='$offleft' WHERE `id` LIKE '$id'");
?>