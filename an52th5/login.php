<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $a=$_POST["acc"];
        $b=$_POST["pas"];
        $c=$_POST["code"];
        $c1=$_SESSION["anscode"];
        $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `user` LIKE '$a'");
        $arr=mysqli_fetch_array($row);
        if(empty($arr[0])){
            echo "帳號輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else if($arr[2]!=$b){
            echo "密碼輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else if($c!=$c1){
            echo "驗證碼輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else{
            $_SESSION["users"]=$arr[1];
            date_default_timezone_set('Asia/Taipei');
            $today=date('Y/m/d H:i:s');
            mysqli_query($db,"INSERT INTO `time`(`user`, `time`, `type`) VALUES ('$arr[1]','$today','登入')");
            if($arr[3]=="管理者"){
                header("location:adminpage.php");
            }else{
                header("location:userspage.php");
            }
        }
        if($_SESSION["qwq"]==3) header("location:qwq.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>登入</title>
</head>
<body>
<form action="login.php" method="post">
帳號:<input type="text" name="acc"><br>
密碼:<input type="password" name="pas"><br>
<img src="checks.php" id="codeans">
<input type="button" value="更換" id="news"><br>
驗證碼:<input type="text" name="code"><br>
<input type="submit" value="登入">
</form>
</body>
</html>
<script>
    $("#news").click(function(){
        $("#codeans").attr("src","checks.php");
    });
</script>