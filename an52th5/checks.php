<?php
    session_start();
    $can="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $checks="";
    $checks=$can[rand(0,strlen($can)-1)].$can[rand(0,strlen($can)-1)].$can[rand(0,strlen($can)-1)].$can[rand(0,strlen($can)-1)];
    $image=imagecreate(100,30);
    $backcolor=imagecolorallocate($image,200,200,200);
    $fontcolor=imagecolorallocate($image,200,0,0);
    imagestring($image,100,35,5,$checks,$fontcolor);
    $_SESSION["anscode"]=$checks;
    imagepng($image);
?>