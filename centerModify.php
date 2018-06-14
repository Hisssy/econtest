<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/5/29
 * Time: 8:05
 */

include 'session.php';
include 'class/MailSend.class.php';
include 'class/RandomNum.class.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');

switch ($_GET['action']) {
    case 'infoModify':
        infoModify();
        break;
    case 'portraitUpload':
        portraitUpload();
        break;
    case 'check_user':
        check_user();
        break;
}

function infoModify()
{
    global $hand;
    $captcha=$_POST["captcha"];
    $user=$_SESSION["user"];
    $sql="select id from find_back_captcha where user='$user' and captcha='$captcha'";
    $result = mysqli_query($hand, $sql);
    $row = mysqli_fetch_array($result);
    if(!$row)
    {
        $dan["msgCode"]='0';
    }
    else {
        $p=$_POST['phone'];
        $e=$_POST['email'];
        $i=$_POST['info'];
        $q=$_POST['qq'];
        if($p&&$e&&$i&&$q){
            $hand->query("UPDATE account_user SET phone='$p',email='$e',qq='$q',info='$i' WHERE user='$user'");
            $dan["msgCode"]='1';
        }else
            $dan["msgCode"]='0';
    }
    echo json_encode($dan);
}

function portraitUpload()
{
    echo 'FILES:'.var_dump($_FILES);
    if (($_FILES["upload"]["type"] == "image/jpeg") or ($_FILES["upload"]["type"] == "image/png")) {
        if ($_FILES["upload"]["error"] > 0) {
            echo "Error: " . $_FILES["upload"]["error"] . "<br />";
        }
        $date = date('Ymdhis');
        $fileName = $_FILES['upload']['name'];
        $name = explode('.', $fileName);
        $dan = $date . '.' . $name[1];
        $newPath = 'media/UserPortrait/' . $dan;
        $oldPath = $_FILES['upload']['tmp_name'];
        if (file_exists($newPath)) {
            echo "请重试";
        }
        else {
            rename($oldPath, $newPath);
            global $hand;
            $sql2 = "UPDATE account_user SET pic='$dan' WHERE user='$_SESSION[user]'";
            mysqli_query($hand, $sql2);
        }
    }else
        echo "文件格式错误";
}
function check_user()
{
    global $hand;
    $user=$_SESSION["user"];
    $mail=$_POST["mail"];
    $num=new RandomNum();
    $captcha=$num->create(6);
    $sql_find="select id from find_back_captcha where user='$user'";
    $result_find = mysqli_query($hand, $sql_find);
    $row_find = mysqli_fetch_array($result_find);
    if(!$row_find)
    {
        $time=time()+300;
        $sql_c="insert into find_back_captcha(`captcha`,`generate_time`,`user`)values('$captcha','$time','$user')";
        $result_c = mysqli_query($hand, $sql_c);
        $captcha='你的验证码是：'.$captcha;
        $mail=new MailSend($mail,'重邮e站验证码',$captcha);
        $mail->send($unspoken);
    }
    else
    {
        $time=time()+300;
        $sql_c="update find_back_captcha set captcha='$captcha',generate_time='$time' where user='$user'";
        $result_c = mysqli_query($hand, $sql_c);
        $captcha='你的验证码是：'.$captcha;
        $mail=new MailSend($mail,'重邮e站验证码',$captcha);
        $mail->send($unspoken);
    }
    $dan["msgCode"]='1';
    echo json_encode($dan);

}
