<?php
/*name比赛名字
intro主题
begin开始时间
stop结束时间
pic路径
allnum总数（页数为1的时候传给你）*/
include 'configure.php';
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$total=5;
$min=$_POST["c_page"]*$total-$total;
if($_POST["c_page"]==1)
{
    $sql="select * from contest_list";
    $result=mysqli_query($hand, $sql);
    $row=mysqli_fetch_assoc($result);
    $num=count($row);
    $dan["allnum"]=$num;
}
$sql_page="select name,intro,begin,stop,imagesrc from contest_list limit $min,5";
$result_page=mysqli_query($hand, $sql_page);
$count=0;
while($row=mysqli_fetch_assoc($result_page))
{
    $dan["$count"]["name"]=$row["name"];
    $dan["$count"]["intro"]=$row["intro"];
    $dan["$count"]["begin"]=$row["begin"];
    $dan["$count"]["stop"]=$row["stop"];
    $dan["$count"]["pic"]=$row["imagesrc"];
    $count++;
}
echo json_encode($dan);
