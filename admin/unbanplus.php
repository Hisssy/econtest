<?php
include '../needauth.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
$uid=$_GET["uid"];
$sql="update account_user set priv=1 where uid='$uid'";
$result=mysqli_query($hand,$sql);
echo "<script language=\"JavaScript\">
window.location.href='index.php';</script>";
