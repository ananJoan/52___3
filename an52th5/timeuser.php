<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間紀錄</title>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table border="1">
    <tr>
    <th>時間</th>
    <th>動作</th>
    </tr>
    <?php
        $row=mysqli_query($db,"SELECT * FROM `time` WHERE `user` LIKE '$id'");
        while($arr=mysqli_fetch_array($row)){
            echo "
            <tr>
            <td>$arr[2]</td>
            <td>$arr[3]</td>
            </tr>
            ";
        }
    ?>
    </table>
</body>
</html>