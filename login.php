<?php
include 'session.php';
include 'configure.php';
session_set_save_handler($handler, true);
session_start();
error_reporting(0);
if($_SESSION['user']){
    echo "<script>alert('您已登录！返回主页中...');window.location.href='index.php';</script>";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        function verifyInfo1(pwd) {
            let obj=document.getElementById('input-rePwd').value;
            let obj2=document.getElementById('reInputPass');
            if (pwd!==obj){
                obj2.innerHTML="";
                obj2.append("密码输入不一致");
            }
            else {
                obj2.innerHTML="";
            }
        }
        function verifyInfo(pwd) {
            let obj=document.getElementById('input-pwd').value;
            let obj2=document.getElementById('reInputPass');
            if (pwd!==obj){
                obj2.innerHTML="";
                obj2.append("密码输入不一致");
            }
            else {
                obj2.innerHTML="";
            }
        }
    </script>
    <style>
        .loginButton {
            height: 50px;
            color: white;
            font-size: 25px;
            width: 80%;
            border-radius: 2px;
            border: none;
            background-color: #5cce99;
            font-weight: 500;
            box-shadow: 0 0 4px #50a074;
            cursor: pointer;
        }

        .loginButton:hover {
            text-shadow: 0 0 2px black;
            background-color: #50a074;
            box-shadow: 0 0 8px #50a074;
        }

        .loginBox {
            background-color: #FFFFFF;
            display: flex;
            width: 100%;
            height: 600px;
            box-shadow: 0 0 4em #333333;
            margin-bottom: 100px;
        }

        .container {
            min-width: 300px;
        }

        .loginSection {
            padding: 10px;
            width: 70%;
            display: flex;
            flex-direction: column;
        }

        .loginImage {
            width: 30%;
        }

        .loginSectionBox {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: auto;
            height: 80%;
            width: 50%;
        }

        .inputLine input {
            color: #404040;
            margin-top: 1%;
            height: 30px;
            width: 100%;
            font-size: 20px;
        }

        .loginCaptchaArea {
            display: flex;
        }

        .loginCaptchaArea input {
            color: #404040;
            margin-top: 1%;
            height: 30px;
            width: 90%;
            font-size: 20px;
        }

        .bottomBar {
            display: flex;
            justify-content: flex-end;
        }

        .topNav{
            font-weight: bold;
            color: #000000;
            font-size: 18px;
            cursor: pointer;
            margin-top: 2%;
            margin-bottom: 2%;
        }

        @media handheld, only screen and (max-width: 768px) {
            .loginBox{
                margin:0;
            }
            .loginImage {
                display: none;
            }
            .loginSection {
                width: 100%;
            }
            .loginSectionBox{
                width: 90%;
            }
            .topNav{
                margin-top: 3%;
                display: none;
            }
        }
    </style>
</head>
<body>
<?php include 'header.html' ?>
<div class="container" style="overflow: visible">

    <p class="topNav"><a href="..">首页</a>&gt;&gt;<a
                href="index.php">赛事专区</a>>>登录</p>
    <div class="loginBox">
        <div class="loginImage">
            <img style="width: 100%;max-height:100% " src="images/loginleft.png">
        </div>
        <div class="loginSection">
            <div class="loginSectionBox" id="sectionBoxLogin" >
                <div style="width: 100%;display: flex">
                    <img src="images/loginhead.png" style="margin: auto">
                </div>
                <form id="loginForm"
                      style="height:65%;display:flex;flex-direction:column;justify-content:space-between">
                    <div class="inputLine">
                        <label for="input-1">学号</label>
                        <input type="text" id="input-1" name="user" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-2">密码</label>
                        <input type="password" id="input-2" name="pwd" required>
                    </div>

                    <div class="loginCaptchaArea">
                        <div style="display: flex;flex-direction: column;width: 60%">
                            <label for="input-3">验证码<span style="color: gray;font-size: x-small">(不区分大小写)</span></label>
                            <input type="text" id="input-3" name="check" required>
                        </div>
                        <img onclick="reload('captcha')" src="verification.php" alt="验证码" id="captcha"
                             style="height: 100%;width: 40%;cursor: pointer">
                    </div>
                    <div style="text-align: center">
                        <button type="button" class="loginButton" onclick="ajaxLoginPost('check.php','loginForm')"><i class="fa fa-sign-in" aria-hidden="true"></i> 登录</button>
                    </div>
                </form>
            </div>
            <div class="loginSectionBox" id="sectionBoxInfo" style="display: none;justify-content: center">
                <form action="userInfoModify.php" method="post"
                      style="height:75%;display:flex;flex-direction:column;justify-content:space-between">
                    <div class="inputLine">
                        <label for="input-pwd">新密码</label>
                        <input type="password" id="input-pwd" name="pwd" onkeyup="verifyInfo1(this.value)" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-rePwd">重复密码<span style="float: right;color: red;font-size: small" id="reInputPass"></span></label>
                        <input type="password" id="input-rePwd" onkeyup="verifyInfo(this.value)" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-qq">QQ号<span style="float: right;color: red;font-size: small" id="reInputPass"></span></label>
                        <input type="text" id="input-qq" name="qq" required>
                    </div>
                    <div class="inputLine">
                        <label for="input-email">邮箱</label>
                        <input type="text" id="input-email" name="email" required>
                    </div>

                    <div style="text-align: center">
                        <button type="submit" class="loginButton" onclick=""><i class="fa fa-check" aria-hidden="true"></i> 提交</button>
                    </div>
                </form>
            </div>
            <div class="bottomBar"><span style="font-size: smaller;color: gray">忘记密码？</span></div>
        </div>
    </div>
</div>
<?php include 'footer.html' ?>
</body>
</html>
