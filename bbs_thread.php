<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/5/7
 * Time: 8:56
 */

include 'needauth.php';

date_default_timezone_set('prc');//时区

$title = $_POST["title"];//标题
$content = $_POST["content"];//内容
$captcha = $_POST["captcha"];//验证码

$conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
if ($captcha != $_SESSION["check"]) {
    $arr = array('msgcode' => 3);
    echo json_encode($arr);
} else if (!($title || $content)) {
    $arr = array('msgcode' => 2);
    echo json_encode($arr);
} else {
    mysqli_select_db($conn, "$db_name") or die('数据库无此库');
    $user = $_SESSION["user"];
    $query2 = "SELECT uid FROM account_user where user='$user'";
    $r2 = mysqli_query($conn, $query2);//反查用户id
    $a2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
    $aid = $a2["uid"];
    $created = intval(time());//时间戳
    $last_reply = $created;
    $sql = "INSERT INTO `bbs_thread` ( `title`, `created`, `last_reply`, `text`, `aid`, `status`) VALUES ( '$title', '$created', '$last_reply', '$content', '$aid', '1');";
    if ($conn->query($sql) == TRUE) {
        $arr = array('msgcode' => 1);
        echo json_encode($arr);
    } else {
        $arr = array('msgcode' => 0);
        echo json_encode($arr);
    }
}
