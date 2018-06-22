<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/6/21
 * Time: 23:59
 */
include 'needauth.php';
include 'configure.php';

$content = $_POST["content"];//内容id
$captcha = $_POST["captcha"];//验证码
$id = $_POST["id"];//帖子

$conn=mysqli_connect("$db_host","$db_user","$db_pwd");

if (!($_POST["check"]==$_SESSION["check"]) ||$conn->connect_error || mysqli_select_db($conn,"bbs_reply")) {
    $arr = array('msgcode'=>0);
    echo json_encode($arr);
}

else if(!($content || $id)){
    $arr = array('msgcode'=>0);
    echo json_encode($arr);
}else
{
    $sql = "INSERT INTO `bbs_reply` (`id`, `content`) VALUES ('$id', '$content');";
    if ($conn->query($sql) === TRUE) {
        $arr = array('msgcode'=>1);
        echo json_encode($arr);
    } else {
        $arr = array('msgcode'=>0);
        echo json_encode($arr);
    }
}