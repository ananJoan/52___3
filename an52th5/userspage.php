<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th5");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["users"];
    $_SESSION["users"]=$user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO工作表</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <style>
        table{
            border-collapse: collapse;
        }
        tr{
            height:50px;
        }
    </style>
</head>
<body>
    <div id="fd" title="修改或刪除">
    <input type="button" value="修改" id="fix">
    <input type="button" value="刪除" id="del">
    </div>
    <div id="newwork" title="新增工作">
    <form action="addwork.php" method="post">
        名稱<input type="text" name="works"><br>
        內容<input type="text" name="content"><br>
        <select name="starttime" id="starttime">
            <option value="0">0</option><option value="1">1</option>
            <option value="2">2</option><option value="3">3</option>
            <option value="4">4</option><option value="5">5</option>
            <option value="6">6</option><option value="7">7</option>
            <option value="8">8</option><option value="9">9</option>
            <option value="10">10</option><option value="11">11</option>
            <option value="12">12</option><option value="13">13</option>
            <option value="14">14</option><option value="15">15</option>
            <option value="16">16</option><option value="17">17</option>
            <option value="18">18</option><option value="19">19</option>
            <option value="20">20</option><option value="21">21</option>
            <option value="22">22</option><option value="23">23</option>
        </select>
        <select name="endtime" id="endtime">
        <option value="0">0</option><option value="1">1</option>
            <option value="2">2</option><option value="3">3</option>
            <option value="4">4</option><option value="5">5</option>
            <option value="6">6</option><option value="7">7</option>
            <option value="8">8</option><option value="9">9</option>
            <option value="10">10</option><option value="11">11</option>
            <option value="12">12</option><option value="13">13</option>
            <option value="14">14</option><option value="15">15</option>
            <option value="16">16</option><option value="17">17</option>
            <option value="18">18</option><option value="19">19</option>
            <option value="20">20</option><option value="21">21</option>
            <option value="22">22</option><option value="23">23</option>
        </select>
        </select><br>
        <select name="nows">
            <option value="未處理">未處理</option>
            <option value="處理中">處理中</option>
            <option value="已處理">已處理</option>
        </select><br>
        <select name="types">
            <option value="普通件">普通件</option>
            <option value="速件">速件</option>
            <option value="最速件">最速件</option>
        </select><br>
        <input type="submit" value="確認">
    </form>
    </div>
    <div id="xifwork" title="修改工作">
    <form action="fixwork.php" method="post">
        名稱<input type="text" name="workname" id="works"><br>
        內容<input type="text" name="content" id="content"><br>
        <select name="starttime" id="starttime1">
        <option value="0">0</option><option value="1">1</option>
            <option value="2">2</option><option value="3">3</option>
            <option value="4">4</option><option value="5">5</option>
            <option value="6">6</option><option value="7">7</option>
            <option value="8">8</option><option value="9">9</option>
            <option value="10">10</option><option value="11">11</option>
            <option value="12">12</option><option value="13">13</option>
            <option value="14">14</option><option value="15">15</option>
            <option value="16">16</option><option value="17">17</option>
            <option value="18">18</option><option value="19">19</option>
            <option value="20">20</option><option value="21">21</option>
            <option value="22">22</option><option value="23">23</option>
        </select>
        <select name="endtime" id="endtime1">
        <option value="0">0</option><option value="1">1</option>
            <option value="2">2</option><option value="3">3</option>
            <option value="4">4</option><option value="5">5</option>
            <option value="6">6</option><option value="7">7</option>
            <option value="8">8</option><option value="9">9</option>
            <option value="10">10</option><option value="11">11</option>
            <option value="12">12</option><option value="13">13</option>
            <option value="14">14</option><option value="15">15</option>
            <option value="16">16</option><option value="17">17</option>
            <option value="18">18</option><option value="19">19</option>
            <option value="20">20</option><option value="21">21</option>
            <option value="22">22</option><option value="23">23</option>
        </select><br>
        <select name="nows" id="nows">
            <option value="未處理">未處理</option>
            <option value="處理中">處理中</option>
            <option value="已處理">已處理</option>
        </select><br>
        <select name="types" id="types">
            <option value="普通件">普通件</option>
            <option value="速件">速件</option>
            <option value="最速件">最速件</option>
        </select><br>
        <input type="text" name="id" id="di">
        <input type="submit" value="確認">
    </form>
    </div>
    <input type="button" value="新增工作" id="addwork">
    <table border="1" id="thetable">
        <tr>
        <th>時間</th>
        <th>工作項目</th>
        </tr>
    </table>
    <input type="button" value="登出" id="outuser">
</body>
</html>
<script>
    for(i=0;i<=22;i+=2){
        i2=i+2;
        $("#thetable").append(`
            <tr>
            <td style="width:70px; height:50px;">`+i+`~`+i2+`</td>
            <td><div style="width:500px; height:25px;" id="work`+i+`"></div>
            <div style="width:500px; height:25px;" id="work`+(i2-1)+`"></div></td>
            </tr>
        `);   
    }
    shows();
    function shows(){
        $(".work").remove();
    $.ajax({
        url:"searchworks.php",
        success:function(e){
            var n=e.split("#@work@#");
            n.pop();
            for(i=0;i<n.length;i++){
                rr=JSON.parse(n[i]);
                $starttime=rr[4];
                $endtime=rr[5];
                $standed=$endtime-$starttime;
                $("#work"+$starttime+"").append(`
                    <div style="height:`+(25*$standed)+`px; width: 150px; background-color:orange;" class="work" id="works`+rr[0]+`">
                        `+$starttime+`~`+$endtime+`<br>
                        `+rr[1]+`<br>
                        `+rr[2]+`,`+rr[3]+`<br>
                        `+rr[6]+`<br>
                    </div>
                `);
                $("#deldel"+rr[0]+"").data("id",rr[0]);
                $("#works"+rr[0]+"").data("id",rr[0]);
                $("#works"+rr[0]+"").data("starttime",rr[4]);
                $("#works"+rr[0]+"").css("left",parseInt(rr[7]));
                //alert($("#works"+rr[0]+"").css("left"));
            }
            $(".work").draggable({
                grid:[1,25],
                stop:function(e){
                    $sttime=$(e.target).data("starttime");
                    $tstime=parseInt(parseInt($(e.target).css("top")+50)/25);
                    $tstime=parseInt($tstime)+parseInt($sttime);
                    //alert($(e.target).css("offleft"));
                    $.post({
                        async:false,
                        url:"dragwork.php",
                        data:{
                            id:$(e.target).data("id"),
                            starttime:$tstime,
                            offleft:$(e.target).css("left"),
                        },
                        success:function(e){
                            shows();
                        },
                    });
                }
            });
        }
    });
    }
$("#outuser").click(function(){
    window.location.href="outuser.php";
});
$("#newwork").dialog({
    autoOpen:false,
});
$("#addwork").click(function(){
    $("#newwork").dialog("open");
});
$("#fd").dialog({
    autoOpen:false,
});
$("body").on("click",".work",function(){
    $("#fix").data("id",$(this).data("id"));
    $("#del").data("id",$(this).data("id"));
    $("#fd").dialog("open");
});
$("body").on("click","#del",function(){
    $id=$("#del").data("id");
    window.location.href="delwork.php?id="+$id+"";
});
$("#xifwork").dialog({
    autoOpen:false,
});
$("body").on("click","#fix",function(){
    $id=$("#fix").data("id");
$.post({
    url:"worksearchfix.php",
    data:{
        id:$id,
    },
    success:function(e){
        $("#xifwork").dialog("open");
        var n=e.split("#@fix@#");
        n.pop();
        rr=JSON.parse(n[0]);
        $("#works").val(rr[0]);
        $("#content").val(rr[5]);
        $("#starttime1").val(rr[3]);
        $("#endtime1").val(rr[4]);
        $("#nows").val(rr[1]);
        $("#types").val(rr[2]);
        $("#di").val($id);
        $("#di").hide();
    }
});
});
</script>