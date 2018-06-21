<?php
include 'session.php';
session_set_save_handler($handler, true);
session_start();
if ($_POST["check"] == $_SESSION["check"]) {
    $pwd = md5($_POST["pwd"]);//加密
    $hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
    mysqli_select_db($hand, "$db_name") or die('数据库无此库');
    $sql = "select user,nickname,email from account_user where user='$_POST[user]' and password='$pwd'";//验证账号密码
    $result = mysqli_query($hand, $sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        //账号或密码错误
        $arr=array('msgCode'=>'2');
        echo json_encode($arr);
    } else {
        //验证初次登陆
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["name"] = $row['nickname'];
        if ($_POST["pwd"]=='000000') {
            $arr=array('msgCode'=>'0');
            echo json_encode($arr);
        } else {
            //登陆成功
            $arr=array('msgCode'=>'1');
            echo json_encode($arr);
        }
    }

} else {
    //验证码错误
    $arr=array('msgCode'=>'3');
    echo json_encode($arr);
}