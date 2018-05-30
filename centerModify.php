<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/5/29
 * Time: 8:05
 */

include 'session.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
switch ($_GET['action']) {
    case 'infoModify':
        infoModify();
        break;
    case 'portraitUpload':
        portraitUpload();
        break;
}

function infoModify()
{
    global $hand;
    $p=$_POST['phone'];
    $e=$_POST['email'];
    $i=$_POST['info'];
    $q=$_POST['qq'];
    if($p&&$e&&$i&&$q){
        $hand->query("UPDATE account_user SET phone='$p',email='$e',qq='$q',info='$i' WHERE user='$_SESSION[user]'");
        echo json_encode('MsgCode', 1);
    }else
        echo json_encode('MsgCode', 0);
}

function portraitUpload()
{
    echo 'FILES:'.var_dump($_FILES);
    if (($_FILES["upload"]["type"] == "image/jpeg") or ($_FILES["upload"]["type"] == "image/png")) {
        if ($_FILES["upload"]["error"] > 0) {
            echo "Error: " . $_FILES["upload"]["error"] . "<br />";
        }
        $date = date('Ymdhis');
        $fileName = $_FILES['upload']['name'];
        $name = explode('.', $fileName);
        $dan = $date . '.' . $name[1];
        $newPath = 'media/UserPortrait/' . $dan;
        $oldPath = $_FILES['upload']['tmp_name'];
        if (file_exists($newPath)) {
            echo "请重试";
        }
        else {
            rename($oldPath, $newPath);
            global $hand;
            $sql2 = "UPDATE account_user SET pic='$dan' WHERE user='$_SESSION[user]'";
            mysqli_query($hand, $sql2);
        }
    }else
        echo "文件格式错误";
}