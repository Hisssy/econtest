<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/5/7
 * Time: 8:56
 */
include 'needauth.php';
include 'configure.php';

date_default_timezone_set('prc');//时区

$tittle = $_POST["tittle"];//标题
$content = $_POST["content"];//内容
$captcha = $_POST["captcha"];//验证码
$tid = $_POST["tid"];//主题

$conn=mysqli_connect("$db_host","$db_user","$db_pwd");
if ($conn->connect_error || mysqli_select_db($conn,"$db_name")) {
    $arr = array('msgcode'=>0);
    echo json_encode($arr);
}

if(!($_POST["check"]==$_SESSION["check"]))
{
    $arr = array('msgcode'=>0);
    echo json_encode($arr);
}
if(!($tittle || $content || $tid)){
    $arr = array('msgcode'=>0);
    echo json_encode($arr);
}else
{

    $aid = $_SESSION["user"];
    $created = intval(time());//时间戳
    $last_reply = $created;
    $sql = "INSERT INTO `bbs_thread` (`tid`, `title`, `created`, `last_reply`, `text`, `aid`, `status`) VALUES (NULL, '$tittle', '$created', '$last_reply', '$content', '$aid', '1');";

    if ($conn->query($sql) === TRUE) {
        $arr = array('msgcode'=>1);
        echo json_encode($arr);
    } else {
        $arr = array('msgcode'=>0);
        echo json_encode($arr);
    }
}
