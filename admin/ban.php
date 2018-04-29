<?php
include '../session.php';
include '../configure.php';
session_set_save_handler($handler, true);//通过session.php将session信息保存在数据库
session_start();
if(!$_SESSION["user"])
{
  echo "<script language=\"JavaScript\">
  window.alert('请登陆');
  window.location.href='login.php';</script>";
}
else
{
  $hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
  mysqli_select_db($hand,"$db_name")or die('数据库无此库');
  $sql="update account_user set priv=0 where uid='$_POST["user"]'";
  $result=mysqli_query($hand,$sql);
  echo "<script language=\"JavaScript\">
  window.location.href='index.php';</script>";
}
