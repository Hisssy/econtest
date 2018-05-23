<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/5/19
 * Time: 10:42
 */
include 'needauth.php';
$pwd=md5("$_POST[pwd]");
$email=$_POST['email'];
$qq=$_POST['qq'];
if($handle->query("UPDATE account_user SET password='$pwd',email='$email',qq='$qq' WHERE user='$_SESSION[user]'"))
    echo "更新信息成功！<a href='index.php'>返回主页</a>";