<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/4/30
 * Time: 9:37
 */


include 'needauth.php';
$hand=mysqli_connect("$db_host","$db_user","$db_pwd")or die('数据库连接失败');
mysqli_select_db($hand,"$db_name")or die('数据库无此库');
if($_SESSION["user"]&&isset($_POST['name']) && isset($_POST['cid']) &&isset($_POST['num'])){
    $contest=$_POST['cid'];
    $user=$_SESSION['user'];
    $team=$_POST['name'];
    $num=$_POST['num'];
    $intro=$_POST['intro'];
    $sql="select name from contest_team where name='$team'";
    $result=mysqli_query($hand,$sql);
    $row=mysqli_num_rows($result);
    if($row==0) {
        $query2="SELECT uid FROM account_user where user='$user'";
        $r2=mysqli_query($hand,$query2);
        $a2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
        $cid=$contest;
        $tcid=$a2["uid"];
        $time=time();
        $sql="insert into contest_team (`cid`, `created`,`name`, `intro`,`peoplenum`,`tcid`,`status`) values('$cid','$time','$team','$intro','$num','$tcid',1)";
        $query1="SELECT tid FROM contest_team where name='$user'";
        $r1=mysqli_query($hand,$query1);
        $a1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
        $tid=$a1['tid'];
        $sql2="insert into contest_join (`cid`, `created`,`tid`, `uid`,`user`,`status`) values('$cid','$time','$tid','$tcid','$user',1)";
        $result=mysqli_query($hand,$sql);
        $return=["msgCode"=>"1"];
        echo json_encode($return);
    }
    else
    {
        $return=["msgCode"=>0];
        echo json_encode($return);
    }
}else{
    echo "<script>alert('请勿直接调用此界面');window.location.href='index.php'</script>";
}
