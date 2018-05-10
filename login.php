<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
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

        .loginImage {
            width: 30%;
        }

        .loginSection {
            padding: 10px;
            width: 70%;
            display: flex;
            flex-direction: column;
        }

        .loginSectionBox {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: auto;
            height: 80%;
            width: 50%;
        }

        .inputLine input{
            color: #404040;
            margin-top: 1%;
            height: 30px;
            width: 100%;
        }

        .loginCaptchaArea {
            display: flex;
        }

        .loginCaptchaArea input{
            color: #404040;
            margin-top: 1%;
            height: 30px;
            width: 90%;
        }
        .bottomBar{
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
<?php include 'header.html' ?>
<div class="container" style="overflow: visible">
    <br>
    <p style="font-weight: bold;color: #000000;font-size: 18px;cursor: pointer;margin: 0;">首页&gt;&gt;赛事专区>>登录</p><br>
    <div class="loginBox">
        <div class="loginImage">
            <img style="width: 100%;max-height:100% " src="images/loginleft.png">
        </div>
        <div class="loginSection">
            <div class="loginSectionBox">
                <div style="width: 100%;display: flex">
                    <img src="images/loginhead.png" style="height: 30%;margin: auto">
                </div>
                <form action="check.php" method="post"
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
                        <img onclick="reload('captcha')" src="verification.php" alt="验证码" id="captcha" style="height: 100%;width: 40%">
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="loginButton">登录</button>
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
