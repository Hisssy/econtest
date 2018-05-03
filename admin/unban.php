<?php
include '../session.php';
include '../configure.php';
session_set_save_handler($handler, true);//通过session.php将session信息保存在数据库
session_start();
if (!$_SESSION["user"]) {
    echo "<script language=\"JavaScript\">
  window.alert('请登陆');
  window.location.href='login.html';</script>";
}
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$sql = "select user,uid from account_user where priv=0";
$result = mysqli_query($hand, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["uid"];
    $name = $row["user"];
    echo '<script type="text/javascript" language="javascript">
<!--
function confirmAct()
{
    return confirm("确定要解封该用户吗?");
}
//-->
</script>';
    echo "<a href='unbanplus.php?uid=$id' onclick ='return confirmAct();'>id:$id,name:$name</a>";
    echo "<br>";
}
echo "<a href='index.php'>返回</a>";
