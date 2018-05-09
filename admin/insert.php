<?php
include '../session.php';
include '../configure.php';
session_set_save_handler($handler, true);//通过session.php将session信息保存在数据库
session_start();
if (!$_SESSION["user"]) {
    echo "<script>
  window.alert('请登陆');
  window.location.href='login.html';</script>";
} else {
    if (($_FILES["file"]["type"] == "image/jpeg") or ($_FILES["file"]["type"] == "image/png")) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        $date = date('Ymdhis');
        $fileName = $_FILES['file']['name'];
        $name = explode('.', $fileName);
        $dan = $date . '.' . $name[1];
        $newPath = 'pic/' . $dan;
        $oldPath = $_FILES['file']['tmp_name'];
        if (file_exists($newPath)) {
            echo "请重试";
        } else {
            rename($oldPath, $newPath);
            $hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
            mysqli_select_db($hand, "$db_name") or die('数据库无此库');
            $time = time();
            $sql2 = "insert into contest_list (`time`, `name`, `intro`, `begin`, `stop`, `address`, `peoplenum`, `status`, `imagesrc`) values('$time','$_POST[name]','$_POST[intro]','$_POST[begin]','$_POST[stop]','$_POST[url]','$_POST[num]',1,'$dan')";
            $result2 = mysqli_query($hand, $sql2);
            echo "<script language=\"JavaScript\">
        window.alert('上传成功');
        window.location.href='index.php';</script>";
        }
    } else {
        echo "文件不符合规范";
    }
}
