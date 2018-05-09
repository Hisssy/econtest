<?php
include '../needauth.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
if($_GET["status"]==1)
{
    $sql="select name from contest_hot";
    $result=mysqli_query($hand,$sql);
    $row = mysqli_fetch_assoc($result)
    $num=count($row);
    if($num>=10)
    {
        echo "<script language=\"JavaScript\">
        window.alert('热门比赛已满');
        window.location.href='hot_contest.php';</script>";
    }
    else
    {
        $id=$_GET["id"];
        $name=$_GET["name"];
        $sql2="insert into contest_hot values('$id','$name')";
        $result2=mysqli_query($hand,$sql2);
        echo "<script language=\"JavaScript\">
        window.location.href='hot_contest.php';</script>";
    }
}
if($_GET["status"]==2)
{
    $name=$_GET["name"];
    $sql="delete form contest_hot where name=$name";
    $result=mysqli_query($hand,$sql);
    echo "<script language=\"JavaScript\">
    window.location.href='hot_contest.php';</script>";
}
