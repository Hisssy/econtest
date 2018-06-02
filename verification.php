<?php
include 'session.php';
include 'configure.php';
include 'class/RandomNum.class.php'
session_set_save_handler($handler, true);
session_start();
$ver=new RandomNum;
$num=$ver->create(4);
$_SESSION["check"]=$num;
$image=$ver->image($num);
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
