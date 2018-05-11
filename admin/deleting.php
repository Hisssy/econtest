<?php
include 'needAuth.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$sql = "select id from contest_list where name='$_GET[name]'";
$result = mysqli_query($hand, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $sql2 = "update contest_list set status=0 where id='$row[id]'";
    $result2 = mysqli_query($hand, $sql2);
    $sql3 = "update contest_join set status=0 where cid='$row[id]'";
    $result3 = mysqli_query($hand, $sql3);
    $sql4 = "update contest_team set status=0 where cid='$row[id]'";
    $result4 = mysqli_query($hand, $sql4);
}
echo "<script language=\"JavaScript\">
  window.location.href='index.php';</script>";
