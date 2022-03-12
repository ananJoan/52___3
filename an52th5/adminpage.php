<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $_SESSION["users"]=$_SESSION["users"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理帳號</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div id="newuser" title="新增使用者">
        <form action="adduser.php" method="post">
            帳號<input type="text" name="acc"><br>
            密碼<input type="text" name="pas"><br>
            <select name="types">
            <option value="管理者">管理者</option>
            <option value="使用者">使用者</option>
            </select><br>
            <input type="submit" value="確定">
        </form>
    </div>
    <div id="xifuser" title="修改使用者">
        <form action="fixuser.php" method="post">
            <input type="text" name="id" id="di"><br>
            密碼<input type="text" name="pas" id="pas"><br>
            <select name="types" id="types">
            <option value="管理者">管理者</option>
            <option value="使用者">使用者</option>
            </select><br>
            <input type="submit" value="確定">
        </form>
    </div>
    <input type="button" value="新增使用者" id="adduser">
    <table border="1">
        <tr>
        <th>使用者</th>
        <th>密碼</th>
        <th>權限</th>
        <th>修改</th>
        <th>刪除</th>
        <th>時間紀錄</th>
        </tr>
        <?php
            $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE 1");
            while($arr=mysqli_fetch_array($row)){
                echo "
                <tr>
                <td>$arr[1]</td>
                <td>$arr[2]</td>
                <td>$arr[3]</td>
                <td><input type='button' value='修改' id='fixuser$arr[0]' class='fixuser'></td>
                <td><a href='deluser.php?id=$arr[0]'>刪除</a></td>
                <td><a href='timeuser.php?id=$arr[1]'>時間紀錄</a></td>
                </tr>
                ";
            }
        ?>
    </table>
    <input type="button" value="登出" id="outuser">
</body>
</html>
<script>
    $("#newuser").dialog({
        autoOpen:false,
    });
    $("#adduser").click(function(){
        $("#newuser").dialog({
            autoOpen:open,
        });
    });
    $("#xifuser").dialog({
        autoOpen:false,
    });
    $(".fixuser").click(function(){
        $idd=$(this).attr('id').substr(7);
        $.post({
            url:"fixsearch.php",
            data:{
                id:$idd
            },
            success:function(e){
                $("#xifuser").dialog({
                    autoOpen:open,
                });
                var n=e.split("@#@");
                n.pop();
                rr=JSON.parse(n[0]);
                $("#pas").val(rr[0]);
                $("#types").val(rr[1]);
                $("#di").val($idd);
                $("#di").hide();
            }
        });
    });
    $("#outuser").click(function(){
        window.location.href="outuser.php";
    });
</script>