<?php
include 'configure.php';
include 'session.php';
session_set_save_handler($handler, true);
session_start();
if ($_POST['check'] == $_SESSION['check']) {
    $hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
    mysqli_select_db($hand, "$db_name") or die('数据库无此库');
    $sql = "select user from account_user where user='$_POST[user]'";
    $result = mysqli_query($hand, $sql);
    $row = mysqli_num_rows($result);
    if ($row == 0) {
        $sql_nickname = "select nickname from account_user where nickname='$_POST[nickname]'";
        $result_nickname = mysqli_query($hand, $sql_nickname);
        $row_nickname = mysqli_num_rows($result_nickname);
        if ($row_nickname == 0) {
            $pwd = md5($_POST["pwd"]);
            $sql = "insert into account_user (`user`, `nickname`, `password`) values('$_POST[user]','$_POST[nickname]','$pwd')";
            $result = mysqli_query($hand, $sql);
            echo "<script>
			window.alert('注册成功');
			window.location.href='login.html';</script>";
        } else {
            echo "<script>
			window.alert('此昵称已被使用');
			window.location.href='register.html';</script>";
        }
    } else {
        echo "<script language=\"JavaScript\">
		window.alert('此用户名已注册');
		window.location.href='register.html';</script>";
    }
} else {
    echo "<script language=\"JavaScript\">
	window.alert('验证码错误');
	window.location.href='register.html';</script>";
}
