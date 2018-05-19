<?php
include 'session.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
$hand->select_db("$db_name") or die('数据库无此库');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <title>重邮e站</title>
</head>
<body style="">
<div id="modal1">
    <div class="mbox">
        <div style="height: 10%"><span onclick="modalClose()"
                                       style="height:40px;float: right;font-size: 40px;cursor: pointer ">×</span></div>
        <div style="height:90%;align-items: center;display: flex;justify-content: center">
            <form id="tform" style="line-height: 30px;width: 70%;">
                <label for="sel1">选择比赛</label>
                <select id="sel1" name="cid">
                    <?php $query = $hand->query("SELECT name,id FROM contest_list");
                    while ($row = $query->fetch_assoc()) : ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
                <br>
                <label for="input1">队伍名</label>
                <input id="input1" placeholder="15字以内" name="name" required>
                <br>
                <label for="input2">所需人数</label>
                <input id="input2" name="num" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入数字" required>
                <br>
                <label for="input3">队伍介绍</label>
                <textarea id="input3" placeholder="介绍一下队伍" name="intro" required></textarea>
                <br>
                <button type="button" style="
    margin-left: 28%;
" onclick="ajaxPost('newteam.php')">提交
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'header.html' ?>
<div class="container">
    <br>
    <p style="font-weight: bold;color: #000000;font-size: 18px;cursor: pointer;margin: 0;">首页&gt;&gt;赛事专区</p>
    <br>
    <div class="main1">
        <div class="left1">
            <div class="search2">
                <div class="sleft" style="
    display:  flex;
    padding-left: 10px;
    height: 70%;
">
                    <form id="sform" style="display:flex;" onsubmit="return false">
                        <input type="text" title="" class="search1" placeholder="请输入比赛或队伍关键词" name="content" required>
                        <select title="" size="1" class="select1" name="method">
                            <option value="1">比赛</option>
                            <option value="2">队伍</option>
                        </select>
                        <img src="images/search2.png" class="fangdajing2" onclick="search('search.php')">
                    </form>
                </div>
                <ul class="fenlei">
                    <li>分类：</li>
                    <li><a href="#" style="text-decoration: none">不限</a></li>
                    <li><a href="#" style="text-decoration: none">正在报名</a></li>
                    <li><a href="#" style="text-decoration: none">报名结束</a></li>
                    <li><a href="#" style="text-decoration: none">即将报名</a></li>
                </ul>
            </div>
            <div class="xiala1">
                <?php $query = $hand->query("SELECT tcid,cid,peoplenum,name FROM contest_team");
                while ($objTeam = $query->fetch_assoc()) : ?>
                    <?php $objUser = $hand->query("SELECT user FROM account_user where uid=$objTeam[tcid]")->fetch_assoc();//面向对象实现
                    $objContest = $hand->query("SELECT name FROM contest_list where id=$objTeam[cid]")->fetch_assoc(); ?>
                    <div class="xialatiao1">
                        <img src="images/tu.png" class="xialatiao_image">
                        <div class="example">
                            <h4 class="title">队名：<span><?php echo $objTeam['name'] ?></span></h4>
                            <div class="ec">
                                <p>队长：<span><?php echo $objUser['user'] ?></span></p>
                                <p>赛事：<span><?php echo $objContest['name'] ?></span></p>
                                <p>人数：<span><?php echo $objTeam['peoplenum'] ?></span></p>
                                <p>加入</p>
                                <p>关注</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="right1">
            <div class="denglu">
                <div class="info" style="
    width: 70%;
">
                    <h4 style="color: #000000;padding-top: 3%;padding-left: 5%;">状态：
                        <?php
                        if (isset($_SESSION["user"]))
                            echo "<span style='color: green'>已登录</span>";
                        else echo "未登录";
                        ?></h4>
                    <h4 style="color: #000000;padding-left: 5%">姓名：<span>
                            <?php
                            if (isset($_SESSION["user"]))
                                echo "$_SESSION[name]";
                            ?></span></h4>
                    <h4 style="color: #043745;padding-left: 5%"></h4>
                    <h4 style="color: #000000;padding-left: 5%">邮箱：<span>
                            <?php

                            if (isset($_SESSION["user"]))
                            {
                                global $hand;
                                $result=$hand->query("SELECT email FROM account_user WHERE user='$_SESSION[user]'")->fetch_assoc();
                                echo "$result[email]";
                            }
                            ?></span></h4>
                    <h4 style="color: #043745;padding-left: 5%"></h4>
                </div>
                <div style="
    width: 28%;
    height: 100%;
    display: flex;
">
                    <i class="fa fa-user" style="font-size: 6em;margin: auto"  aria-hidden="true"></i>
                </div>
            </div>
            <div class="block_btn">
                <div class="btn">
                    <button class="dec" style="margin-bottom: 1.5%;background-color: #f6868b;width: 100%;"
                            onclick="modalOpen()">创建队伍
                    </button>
                    <button class="dec" style="background-color: #f6bd80;width: 100%;">管理队伍</button>
                </div>
                <div class="btn">
                    <button onclick="window.location.href='<?php
                    if (isset($_SESSION["user"]))
                        echo "logout.php";
                    else echo "login.php";
                    ?>'" class="dec" style="margin-bottom: 1.5%;background-color: #458df9;">
                        <?php
                        if (isset($_SESSION["user"]))
                            echo "退出";
                        else echo "登录";
                        ?></button>
                    <button class="dec" style="background-color: #8dd16f;">个人<br>中心</button>
                    <button class="dec" style="background-color: #999999; ">找回<br>密码</button>
                    <button class="dec" style="background-color: #c2dc49;">关于<br>我们</button>
                </div>
            </div>
        </div>
    </div>
    <div class="main2">
        <div class="left2">

            <?php $sqlContestInfo = "SELECT name,intro,begin,stop,imagesrc FROM contest_list where status=1";
            $query = $hand->query($sqlContestInfo) ?>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <div class="example1">

                    <img src="admin/pic/<?php echo $row['imagesrc'] ?>" style="width: 30%" class="image">
                    <div class="information">
                        <p style="color: #000000;font-size: 18px;padding: 1%;margin-top:0">
                            大赛名称：<span><?php echo $row['name'] ?></span></p>
                        <p style="overflow: hidden;
    height: 40%;
    color: #000000;
    font-size: 18px;
    padding: 1%;
    margin-right: 3%;">大赛主题：<span id="intro"><?php echo $row['intro'] ?></span></p>
                        <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">
                            报名时间：<span><?php echo $row['begin'] . "到" . $row['stop'] ?></span></p>
                        <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="right2">
            <!--     我加入的队伍       -->
            <div class="friends">
            </div>
            <div class="redian">
                <div style="margin-top: 2%">
                    <h3 style="
    margin-left: 5%;
">热点赛事</h3>

                    <ol style="
    padding-right: 15px;
">
                        <li>2018中国旅游商品大赛<a href="#" style="
    float: right;
">了解更多</a></li>
                        <li>2018中国旅游商品大赛<a href="#" style="
    float: right;
">了解更多</a></li>
                        <li>2018中国旅游商品大赛<a href="#" style="
    float: right;
">了解更多</a></li>
                        <li>2018中国旅游商品大赛<a href="#" style="
    float: right;
">了解更多</a></li>
                        <li>2018中国旅游商品大赛<a href="#" style="
    float: right;
">了解更多</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main3">
        <div class="lv">
            <div class="lv_right">
                <div class="wd">
                    <h3 style="
    margin-top: 0;
">问答区</h3>
                    <ul style="list-style: none;margin-bottom: 3px;padding-left: 0;margin-top: 0">
                        <li><a href="#">这个ACM比赛是怎么回事？</a><span>回答（0）</span></li>
                        <li><a href="#">摄影作品在此，有人来交流的吗？</a><span>回答（0）</span></li>
                        <li><a href="#">创新创业大赛有那些人感兴趣的？</a><span>回答（0）</span></li>
                        <li><a href="#">卖竹鼠，3元1只,10元3只谁要？</a><span>回答（0）</span></li>
                        <li><a href="#">我这个问题啊，描述起来比较麻烦，所以要用好多字来说，写都写不...</a><span>回答（0）</span></li>
                        <li><a href="#">这一页最后一个问题辣？</a><span>回答（0）</span></li>
                    </ul>
                    <div class="pagination">
                        <div style="justify-content: space-between; width: 30%;display: flex;">
                            <button><i class="fa fa-arrow-left" aria-hidden="true"></i>上一页</button>
                            1/5
                            <button>下一页<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <div class="tw">
                    <h3 style="margin-top: 0;">提问</h3>
                    <form id="tw1">
                        <input placeholder="标题" name="title" width="50%">
                        <textarea class="ban" style="margin-top: -2%" title="" name="content"></textarea>
                        <div class="fb">
                            <div style="width: 30%;display: flex">
                                <img src="verification.php" onclick="reload('captcha')" id="captcha" alt="验证码">
                                <input title="" name="captcha" required="">
                            </div>
                            <button onclick="bbsPost('bbs_thread.php')" type="button" class="btn2">发布</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.html' ?>
</html>