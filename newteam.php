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
if(isset($_POST['cname'])&&isset($_POST['name'])&&isset($_POST['num'])){
    $contest=$_POST['cname'];
    $user=$_SESSION['user'];
    $team=$_POST['name'];
    $num=$_POST['num'];
    $intro=$_POST['intro'];
    $sql="select name from contest_team where name='$team'";
    $result=mysqli_query($hand,$sql);
    $row=mysqli_num_rows($result);
    if($row==0) {
        $query1="SELECT id FROM contest_list where name='$contest'";
        $query2="SELECT uid FROM account_user where user='$user'";
        $r1=mysqli_query($hand,$query1);
        $r2=mysqli_query($hand,$query2);
        $a1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
        $a2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
        $cid=$a1["id"];
        $tcid=$a2["uid"];
        $time=time();
        $sql="insert into contest_team (`cid`, `created`,`name`, `intro`,`peoplenum`,`tcid`,`status`) values('$cid','$time','$team','$intro','$num','$tcid',1)";
        $result=mysqli_query($hand,$sql);
    }
    else
    {
        echo "<script>
			window.alert('此队名已被使用');
			window.location.href='register.html';</script>";
    }
}else{
    echo "<script>alert('请勿直接调用此界面');window.location.href='index.php'</script>";
}
