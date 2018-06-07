<?php
include 'configure.php';
include 'class/MailSend.class.php';
include 'class/RandomNum.class.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
switch ($_GET['action']) {
    case 'check_user':
        check_user();
        break;
    case 'check_captcha':
        check_captcha();
        break;
    case 'update_password':
        update_password();
        break;
}
function check_user()
{
    global $hand;
    $user=$_POST["user"];
    $sql_mail="select email from account_user where user='$user'";
    $result_mail = mysqli_query($hand, $sql_mail);
    $row_mail = mysqli_fetch_array($result_mail);
    if (!$row_mail) {
        //账号或密码错误
        $dan["msgCode"]='0';
        echo json_encode($dan);
    } else {
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
            $mail=new MailSend($row_mail["email"],'重邮e站验证码',$captcha);
            $mail->send();
        }
        else
        {
            $time=time()+300;
            $sql_c="update find_back_captcha set captcha='$captcha',generate_time='$time' where user='$user'";
            $result_c = mysqli_query($hand, $sql_c);
            $captcha='你的验证码是：'.$captcha;
            $mail=new MailSend($row_mail["email"],'重邮e站验证码',$captcha);
            $mail->send();
        }
        $dan["msgCode"]='1';
        echo json_encode($dan);
    }
}
function check_captcha()
{
    global $hand;
    $captcha=$_POST["captcha"];
    $user=$_POST["user"];
    $sql="select id from find_back_captcha where user='$user' and captcha='$captcha'";
    $result = mysqli_query($hand, $sql);
    $row = mysqli_fetch_array($result);
    if(!$row)
    {
        $dan["msgCode"]='0';
    }
    else {
        $dan["msgCode"]='1';
    }
    echo json_encode($dan);
}
function update_password()//此次有安全漏洞，记住以后修补
{
    global $hand;
    $user=$_POST["user"];
    $password=md5($_POST["password"]);
    $sql="update account_user set password='$password' where user='$user'";
    $result = mysqli_query($hand, $sql);
}
