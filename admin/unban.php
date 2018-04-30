<?php
include '../needauth.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
$sql="select user,uid from account_user where status=0";
$result=mysqli_query($hand,$sql);
while($row = mysqli_fetch_assoc($result))
{
  $id=$row["uid"];
  $name=$row["user"];
  echo '<script type="text/javascript" language="javascript">
<!--
function confirmAct()
{
    if(confirm("确定要解封该用户吗?"))
    {
        return true;
    }
    return false;
}
//-->
</script>';
  echo "<a href='unbanplus.php?uid=$id' onclick ='return confirmAct();'>id:$id,name:$name</a>";
  echo "<br>";
}
echo "<a href='index.php'>返回</a>";
