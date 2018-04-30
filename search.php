<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/4/30
 * Time: 11:17
 */

//无需登录
//POST表单数据，content(搜索内容)，method(搜索方式 1:通过比赛名称 2:通过队伍名称)
//返回JSON串，结构1{"tcname":"队长名字","contest":"比赛","peoplenum":"所需人数"}
include 'configure.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
$search=array(array());
if($_POST["method"]==1)
{
  $name=$_POST["content"];
  $sql="select id,name from contest_list where name like '%$name%' and status=1";
  $result=mysqli_query($hand,$sql);
  $num=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $cid=$row["id"];
    $cname=$row["name"];
    $sql2="select tcid,tid,peoplenum from contest_team where cid='$cid' and status=1";
    $result2=mysqli_query($hand,$sql2);
    while($row2=mysqli_fetch_assoc($result2))
    {
      $tid=$row2["tid"];
      $tcid=$row2["tcid"];
      $sql3="select uid from contest_join where cid='$cid' and tid='$tid'";
      $result3=mysqli_query($hand,$sql3);
      $row3=mysqli_fetch_assoc($result3);
      $abc=count($row3);
      $peoplenum=$row2["peoplenum"]-$abc;
      $sql4="select user from account_user where uid='$tcid'";
      $result4=mysqli_query($hand,$sql4);
      $row4=mysqli_fetch_assoc($result4);
      $search["$num"]["tcname"]=$row4["user"];
      $search["$num"]["contest"]=$cname;
      $search["$num"]["peoplenum"]=$peoplenum;
      $num++;
    }
  }

   echo json_encode($search);
}
else if($_POST["method"]==2)
{
  $name=$_POST["content"];
  $sql="select tid,cid,tcid,peoplenum from contest_team where name like '%$name%' and status=1";
  $result=mysqli_query($hand,$sql);
  $num=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $cid=$row["cid"];
    $tid=$row["tid"];
    $tcid=$row["tcid"];
    $sql2="select user from account_user where uid='$tcid'";
    $result2=mysqli_query($hand,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $sql3="select name from contest_list where id='$cid'";
    $result3=mysqli_query($hand,$sql3);
    $row3=mysqli_fetch_assoc($result3);
    $sql4="select uid from contest_join where cid='$cid' and tid='$tid'";
    $result4=mysqli_query($hand,$sql4);
    $row4=mysqli_fetch_assoc($result4);

    $abc=count($row4);
    $peoplenum=$row["peoplenum"]-$abc;
    $search["$num"]["tcname"]=$row2["user"];
    $search["$num"]["contest"]=$row3["name"];
    $search["$num"]["peoplenum"]=$peoplenum;
    $num++;
  }
  echo json_encode($search);
}
