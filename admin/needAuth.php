<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/5/11
 * Time: 15:20
 */

//需要登录的页面都用此头文件

include '../session.php';
include '../configure.php';
session_set_save_handler($handler, true);
session_start();
$a=$_SESSION["user"];
$sql="select user from account_admin where user='$a'";
$row=mysqli_fetch_array($handle->query($sql));

if (!$row) {
    echo "<script>
  window.alert('请登陆');
  window.location.href='login.html';</script>";
}