<?php
include 'session.php';
session_set_save_handler('_session_open','_session_close','_session_read','_session_write','_session_destroy','_session_gc');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta >
    <title>重邮e站</title>
    <link type="text/css" rel="stylesheet" href="css/index.css" />
    <script src="js/index.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="head">
    <img src="images/logo.png" class="logo" />
    <ul class="daohang">
        <li>首页</li>
        <li>往期推送</li>
        <li>微校专栏</li>
        <li>大事记</li>
        <li>重邮图库</li>
        <li>更多相关</li>
        <li> <input type="text" value="" class="search" /> <img src="images/放大镜.png" class="fangdajing" /> </li>
    </ul>
</div>
<div class="boby">
    <div class="main1">
        <p style="font-weight: bold;color: #000000;font-size: 18px;cursor: pointer;margin: 0;">首页&gt;&gt;赛事专区</p>
        <div class="left1">
            <input type="text" value="请输入比赛或队伍关键词" class="search1" />
            <select class="select1" size="2"> <option value="0">比赛</option> <option value="1">队伍</option> </select>
            <img src="images/放大镜2.png" class="fangdajing2" />
            <ul class="fenlei">
                <li>分类：</li>
                <li><a href="#" style="text-decoration: none" >不限</a></li>
                <li><a href="#" style="text-decoration: none" >正在报名</a></li>
                <li><a href="#" style="text-decoration: none" >报名结束</a></li>
                <li><a href="#" style="text-decoration: none" >即将报名</a></li>
            </ul>
            <div class="xiala1">
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <p>赛事名称：<span>（队长的ID）</span></p>
                        <p>成员数目：<span>（队长的ID）</span></p>
                        <p>加入队伍</p>
                        <p>关注队伍</p>
                    </div>
                </div>
                <br />
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <p>赛事名称：<span>（队长的ID）</span></p>
                        <p>成员数目：<span>（队长的ID）</span></p>
                        <p>加入队伍</p>
                        <p>关注队伍</p>
                    </div>
                </div>
                <br />
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <p>赛事名称：<span>（队长的ID）</span></p>
                        <p>成员数目：<span>（队长的ID）</span></p>
                        <p>加入队伍</p>
                        <p>关注队伍</p>
                    </div>
                </div>
                <br />
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <p>赛事名称：<span>（队长的ID）</span></p>
                        <p>成员数目：<span>（队长的ID）</span></p>
                        <p>加入队伍</p>
                        <p>关注队伍</p>
                    </div>
                </div>
                <br />
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <p>赛事名称：<span>（队长的ID）</span></p>
                        <p>成员数目：<span>（队长的ID）</span></p>
                        <p>加入队伍</p>
                        <p>关注队伍</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="right1">
            <div class="denglu">

                <h4 style="color: #000000;padding-top: 7%;padding-left: 5%">状态：<span>
                        <?php
                        if (isset($_SESSION["user"]))
                        echo "已登录";
                        else echo "未登录";
                        ?>
                    </span></h4>
                <h4 style="color: #000000;padding-left: 5%">ID：<span>
                        <?php
                        if (isset($_SESSION["user"]))
                            echo $_SESSION["user"];
                        else echo "-";
                        ?>
                    </span></h4>
                <h4 style="color: #043745;padding-left: 5%"><a onclick="window.location.href='logout.php'">
                        <?php
                        if (isset($_SESSION["user"]))
                            echo "退出";
                        else echo "-";
                        ?></a></h4>
                <img src="images/789.png" class="touxiang" />
            </div>
            <div class="block">
                <div class="block_left">
                    <a href="login.html" style="text-decoration: none"><h4 style="background-color: #f6868b;width: 45%;line-height: 450%;text-align: center;border-radius: 5px;cursor: pointer" id="link">我的赛事</h4></a>
                    <h4 style="background-color: #f6bd80;width: 45%;line-height: 450%;text-align: center;border-radius: 5px;cursor: pointer">我的组队</h4>
                </div>
                <div class="block_right">
                    <h4><a href="login.html"><p style="background-color: #458df9;line-height: 450%;width: 20%;text-align: center;border-radius: 5px;cursor: pointer">登录</p></a> <p style="background-color: #8dd16f;line-height: 450%;width: 20%;text-align: center;border-radius: 5px;cursor: pointer">个人中心</p></h4>
                    <br />
                    <h4 class="pic"><p style="background-color: #999999;line-height: 450%;width: 20%;text-align: center;border-radius: 5px;cursor: pointer">问题反馈</p><p style="background-color: #c2dc49;line-height: 450%;width: 20%;text-align: center;border-radius: 5px;cursor: pointer">关于我们</p></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main2">
        <div class="left2">
            <div class="example0">
                <img src="images/tu.png" style="width: 30%" class="image" />
                <div class="information">
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-top: 8%;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <img src="images/tu.png" style="width: 30%" class="image" />
                <div class="information">
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-top: 8%;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <img src="images/tu.png" style="width: 30%" class="image" />
                <div class="information">
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-top: 8%;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <img src="images/tu.png" style="width: 30%" class="image" />
                <div class="information">
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-top: 8%;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <img src="images/tu.png" style="width: 30%" class="image" />
                <div class="information">
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-top: 8%;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
        </div>
        <div class="right2">
            <div class="zong">
                <div class="bufen">
                    <div class="qw">
                        <div class="friends">
                            <ul class="ful">
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                                <li>
                                    <div class="a111">
                                        <img src="images/789.png" />
                                        <p style="color: #000000;margin-top: 3%;margin-left: 30%">ID:(此人的名字) &nbsp;&nbsp;&nbsp;删除好友<br /><br />个人说明：</p>
                                    </div> </li>
                            </ul>
                        </div>
                        <div class="redian">
                            <div style="margin-top: 2%">
                                <b>&nbsp;【热点赛事】</b>
                                <br />
                                <span> 1.2018中国旅游商品大赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">了解更多</a></span>
                                <br />
                                <span> 2.2018中国旅游商品大赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">了解更多</a></span>
                                <br />
                                <span> 3.2018中国旅游商品大赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">了解更多</a></span>
                                <br />
                                <span> 4.2018中国旅游商品大赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">了解更多</a></span>
                                <br />
                                <span> 5.2018中国旅游商品大赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">了解更多</a></span>
                                <br />
                            </div>
                        </div>
                        <img src="images/askldjml.png" style="width: 32%;height: 20%;margin-top: 55%;margin-left: 59%" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main3">
        <div class="lv">
            <div class="lv_left">
                <div class="lt" onmouseover="a('.lt')" onmouseout="b('.lt')">
                    <img src="images/lt.png" />
                    <p style="text-align: center">比赛论坛</p>
                </div>
                <div class="wt" onmouseover="a('.wt')" onmouseout="b('.wt')">
                    <img src="images/wt.PNG" />
                    <p style="text-align: center">我的问题</p>
                </div>
            </div>
            <div class="lv_right">
                <div class="wd">
                    <ul>
                        <p style="color: #000000">【问答】</p>
                        <li style="margin-left: -12%;margin-top: 3%"><a href="#">这个ACM比赛是怎么回事？</a><span>回答（0）</span></li>
                        <br />
                        <li style="margin-left: -32%;margin-top: 3%"><a href="#">摄影作品在此，有人来交流的吗？</a><span>回答（0）</span></li>
                        <br />
                        <li style="margin-left: -38.5%;margin-top: 3%"><a href="#">创新创业大赛有那些人感兴趣的？</a><span>回答（0）</span></li>
                        <br />
                        <li style="margin-left: -38.5%;margin-top: 3%"><a href="#">卖竹鼠，3元1只,10元3只谁要？</a><span>回答（0）</span></li>
                        <br />
                        <li style="margin-left: -38.5%;margin-top: 3%"><a href="#">我这个问题啊，描述起来比较麻烦，所以要用好多字来说，写都写不...</a><span>回答（0）</span></li>
                        <br />
                        <li><a href="#">这一页最后一个问题辣？</a><span>回答（0）</span></li>
                    </ul>
                    <div style="width: 40%">
                        <div class="syy" style="width: 22%">
                            <a href="#">上一页</a>
                        </div>
                        <div class="ys">
                            1/5
                        </div>
                        <div class="xyy" style="width: 22%">
                            <a href="#">下一页</a>
                        </div>
                    </div>
                </div>
                <div class="tw">
                    <p style="color: #000000;margin-top: 2%">【我要提问】</p>
                    <textarea class="ban" style="margin-top: -2%"></textarea>
                    <div class="fb">
                        <p><a href="#">发布</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bq">
    <div class="bq_ul">
        <ul>
            <li> <a>版权所有@重邮e站</a> </li>
            <li> <a>地址：重庆南岸区崇文路2号</a> </li>
            <li> <a>邮编：xxxxxxx</a> </li>
            <li> <a>邮箱：xxxxxxx</a> </li>
            <li> <a>渝ICPxxxxxxx</a> </li>
        </ul>
    </div>
    <!--qqwxxl-->
    <p class="bq_lx"> <img src="images/qqt.jpg" /> <img src="images/wxt.jpg" /> <a href="https://weibo.com/cyez"><img src="images/xlt.jpg" /></a> </p>
    <div class="kk">
        <img src="images/QQ图片20180409175117.jpg" style="width: 80%" />
    </div>
</div>
</body>
</html>