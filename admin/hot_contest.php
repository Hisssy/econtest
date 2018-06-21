<?php
include 'needAuth.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$sql = "select name,id from contest_list where status=1 and name not in(select name from contest_hot)";//找不同
$result = mysqli_query($hand, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $name = rawurlencode($row["name"]);//编码
    echo "<a href='hot_contest_join.php?id=$id&name=$name&status=1' onclick ='return confirm(\"确定要添加该竞赛吗?\");'>$row[name]</a>";
    echo "<br>";
}
echo "热门比赛：<br>";
$sql2 = "select name,contestid from contest_hot";
$result2 = mysqli_query($hand, $sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
    $name = $row2["contestid"];
    echo "<a href='hot_contest_join.php?name=$name&status=2' onclick ='return confirm(\"确定要删除该热门竞赛吗?\");'>$row2[name]</a><br>";
}
echo "<a href='index.php'>返回</a>";
