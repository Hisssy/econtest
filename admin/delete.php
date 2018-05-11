<?php
include 'needAuth.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$sql = "select name from contest_list where status=1";
$result = mysqli_query($hand, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['name'];
    echo "<a href='deleting.php?name=$id' onclick ='return confirm(\"确定要删除该竞赛吗?\")'>$id</a>";
    echo "<br>";
}
echo "<a href='index.php'>返回</a>";
