<?php
include '../session.php';
include '../configure.php';
session_set_save_handler($handler, true);//通过session.php将session信息保存在数据库
if(!$_SESSION["user"])
{
  echo "<script language=\"JavaScript\">
  window.alert('请登陆');
  window.location.href='login.php';</script>";
}
else
{
  $hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
  mysqli_select_db($hand,"$db_name")or die('数据库无此库');
  $sql="select name from contest_list where status=1";
  $result=mysqli_query($hand,$sql);
  while($row = mysqli_fetch_assoc($result))
  {
    $id=$row[name];
    echo '<script type="text/javascript" language="javascript">
  <!--
  function confirmAct()
  {
      if(confirm("确定要删除该竞赛吗?"))
      {
          return true;
      }
      return false;
  }
  //-->
  </script>';
    echo "<a href='deleting.php?name=$id' onclick ='return confirmAct();'>$id</a>";
    echo "<br>";
  }
  echo "<a href='index.php'>返回</a>";
}
