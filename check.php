<?php
include 'session.php';
session_set_save_handler($handler, true);
session_start();
if($_POST["check"]==$_SESSION["check"])
{
  $pwd=md5($_POST["pwd"]);//加密
  $_SESSION["user"]=$_POST["user"];
  $_SESSION["pwd"]=$pwd;
  $hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
  mysqli_select_db($hand,"$db_name")or die('数据库无此库');
  $sql="select user from account_user where user='$_SESSION[user]' and password='$pwd'";//验证账号密码
  $result=mysqli_query($hand,$sql);
  $row=mysqli_fetch_array($result);
  if($row)
  {
    echo "<script language=\"JavaScript\">
    window.alert('登录成功');
    window.location.href='index.php';</script>";
  }
  else
  {
    echo "<script language=\"JavaScript\">
    window.alert('账号或密码错误');
    window.location.href='login.html';</script>";
  }
}
else
{
  echo "<script language=\"JavaScript\">
  window.alert('验证码错误');
  window.location.href='login.html';</script>";
}
