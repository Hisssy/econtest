<?php
include '../needauth.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
$sql="select a.name,a.id from contest_list a,contest_hot b where a.status=1 and a.name!=b.name";
$result=mysqli_query($hand,$sql);
while($row = mysqli_fetch_assoc($result))
{
  $id=$row["id"];
  $name=$row["name"];
  echo '<script type="text/javascript" language="javascript">
<!--
function confirmAct()
{
    if(confirm("确定要添加该竞赛吗?"))
    {
        return true;
    }
    return false;
}
//-->
</script>';
  echo "<a href='hot_contest_join.php?id=$id&name=$name&status=1' onclick ='return confirmAct();'>$name</a>";
  echo "<br>";
}
echo "热门比赛：";
echo "<br>";
$sql2="select name from contest_hot";
$result2=mysqli_query($hand,$sql2);
while($row2 = mysqli_fetch_assoc($result2))
{
  $name=$row2["name"];
  echo '<script type="text/javascript" language="javascript">
<!--
function confirmAct()
{
    if(confirm("确定要删除该热门竞赛吗?"))
    {
        return true;
    }
    return false;
}
//-->
</script>';
  echo "<a href='hot_contest_join.php?name=$name&status=2' onclick ='return confirmAct();'>$name</a>";
  echo "<br>";
}
echo "<a href='index.php'>返回</a>";
