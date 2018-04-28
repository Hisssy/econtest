<?php
include 'session.php';
session_set_save_handler('_session_open','_session_close','_session_read','_session_write','_session_destroy','_session_gc');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>重邮e站</title>
    <link type="text/css" rel="stylesheet" href="css/index.css" />
    <!--    <link href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">-->
    <script src="js/index.js"></script>
    <script src="js/jquery.min.js"></script>
    <!--    <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>-->
</head>
<body>
<div style="
    background-color: #1cc3c9;
">
    <div class="container header">
        <img src="images/logo.png" class="logo" />
        <div class="nav2" style="
    display:  flex;
    align-items: center;
">
            <ul class="daohang">
                <li>首页</li>
                <li>往期推送</li>
                <li>微校专栏</li>
                <li>大事记</li>
                <li>重邮图库</li>
                <li>更多相关</li>
                <li> <input type="text" class="search"  title=""/> <img src="images/放大镜.png" class="fangdajing" /> </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <br />
    <p style="font-weight: bold;color: #000000;font-size: 18px;cursor: pointer;margin: 0;">首页&gt;&gt;赛事专区</p>
    <br />
    <div class="main1">
        <div class="left1">
            <div class="search2">
                <div class="sleft" style="
    display:  flex;
    padding-left: 10px;
    height: 70%;
">
                    <input type="text" placeholder="请输入比赛或队伍关键词" class="search1" title="" />
                    <select title="" class="select1" size="2"> <option value="0">比赛</option> <option value="1">队伍</option> </select>
                    <img src="images/放大镜2.png" class="fangdajing2" />
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
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
                <div class="xialatiao1">
                    <img src="images/tu.png" class="xialatiao_image" />
                    <div class="example">
                        <h4 class="title">队长：<span>（队长的ID）</span></h4>
                        <div class="ec">
                            <p>赛事名称：<span>（队长的ID）</span></p>
                            <p>成员数目：<span>（队长的ID）</span></p>
                            <p>加入队伍</p>
                            <p>关注队伍</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right1">
            <div class="denglu">
                <div class="info" style="
    width: 60%;
">
                    <h4 style="color: #000000;padding-top: 7%;padding-left: 5%;">状态：
                        <?php
                        if (isset($_SESSION["user"]))
                            echo "<span style='color: green'>已登录</span>";
                        else echo "未登录";
                        ?></h4>
                    <h4 style="color: #000000;padding-left: 5%">ID：<span>
                            <?php
                            if (isset($_SESSION["user"]))
                                echo $_SESSION["user"];
                            else echo "-";
                            ?></span></h4>
                    <h4 style="color: #043745;padding-left: 5%"></h4>
                </div>
                <div id="dimg" style="
    margin: 2%;
    width: 28%;
    height: 60%;
">
                    <img src="images/789.png" class="touxiang" />
                </div>
            </div>
            <div class="block_btn">
                <div class="btn" style="


">
                    <button class="dec" style="margin-bottom: 1.5%;background-color: #f6868b;width: 100%;">我的赛事</button>
                    <button class="dec" style="background-color: #f6bd80;width: 100%;">我的组队</button>
                </div>
                <div class="btn">
                    <button onclick="window.location.href='login.html'" class="dec" style="margin-bottom: 1.5%;background-color: #458df9;">
                        <?php
                        if (isset($_SESSION["user"]))
                            echo "退出";
                        else echo "登录";
                        ?></a></button>
                    <button class="dec" style="background-color: #8dd16f;">个人<br />中心</button>
                    <button class="dec" style="background-color: #999999; ">问题<br />反馈</button>
                    <button class="dec" style="background-color: #c2dc49;">关于<br />我们</button>
                </div>
            </div>
        </div>
    </div>
    <div class="main2">
        <div class="left2">
            <div class="example1">
                <div class="information">
                    <img src="images/tu.png" style="width: 30%" class="image" />
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-top:0">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>[&quot;20180320&quot;, &quot;20180515&quot;]</span></p>
                    <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <div class="information">
                    <img src="images/tu.png" style="width: 30%" class="image" />
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <div class="information">
                    <img src="images/tu.png" style="width: 30%" class="image" />
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <div class="information">
                    <img src="images/tu.png" style="width: 30%" class="image" />
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
            <div class="example1">
                <div class="information">
                    <img src="images/tu.png" style="width: 30%" class="image" />
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛名称：<span>2018中国旅游商品大赛</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">大赛主题：<span>本次大赛的书画艺术生活化创意旅游商品主要包括：以陶瓷、金属、纺织品、玻璃、竹木等为材料，以生活中...</span></p>
                    <p style="color: #000000;font-size: 18px;padding: 1%;margin-right: 3%">报名时间：<span>3月20日至5月15日</span></p>
                    <p style="float: right;margin-right: 4%;color: #000000">更多信息...</p>
                </div>
            </div>
        </div>
        <div class="right2">
            <div class="friends">
                <ul class="ful" style="
    padding-left: 5%;
    padding-right: 5%;
">
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字) <span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字)<span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字) <span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字) <span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字) <span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                    <li>
                        <div class="a111">
                            <img src="images/789.png" />
                            <p>ID:(此人的名字) <span style="float: right">删除好友</span><br /><br />个人说明：</p>
                        </div> </li>
                </ul>
            </div>
            <div class="redian">
                <div style="margin-top: 2%">
                    <b>【热点赛事】</b>
                    <br />
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
            <div class="img-right">
                <img src="images/askldjml.png" style="width: 100%;height: 100%" />
            </div>
        </div>
    </div>
    <div class="main3">
        <div class="lv">
            <div class="lv_left">
                <div class="lt" onmouseover="a('.lt')" onmouseout="b('.lt')" style="">
                    <img src="images/lt.png" style="opacity: 1;" />
                    <p style="text-align: center; opacity: 0; transition: transform 1s; transform: translate(0px, 240%);">比赛论坛</p>
                </div>
                <div class="wt" onmouseover="a('.wt')" onmouseout="b('.wt')" style="">
                    <img src="images/wt.PNG" style="opacity: 1;" />
                    <p style="text-align: center; opacity: 0; transition: transform 1s; transform: translate(0px, 240%);">我的问题</p>
                </div>
            </div>
            <div class="lv_right">
                <div class="wd">
                    <p style="color: #000000">【问答】</p>
                    <ul style="list-style: none;margin-bottom: 3px;padding-left: 0;margin-top: 0">
                        <li><a href="#">这个ACM比赛是怎么回事？</a><span>回答（0）</span></li>
                        <li><a href="#">摄影作品在此，有人来交流的吗？</a><span>回答（0）</span></li>
                        <li><a href="#">创新创业大赛有那些人感兴趣的？</a><span>回答（0）</span></li>
                        <li><a href="#">卖竹鼠，3元1只,10元3只谁要？</a><span>回答（0）</span></li>
                        <li><a href="#">我这个问题啊，描述起来比较麻烦，所以要用好多字来说，写都写不...</a><span>回答（0）</span></li>
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
                    <textarea class="ban" style="margin-top: -2%" title=""></textarea>
                    <div class="fb">
                        <p><a href="#">发布</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bq">
    <div class="container bq">
        <div class="bq_ul">
            <ul style="
    margin-top: 0;
">
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
</div>
</body>
</html>