<?php
include 'session.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
$hand->select_db("$db_name") or die('数据库无此库');
?>

<!DOCTYPE HTML>
<html lang="zh-cmn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
        <title>赛事专区</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/contest.css">
    </head>
    <body>

    <nav class="navbar nav-static-top
 navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand" href="#">竞赛组队系统</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item dropdown "><a class="nav-link dropdown-toggle text-center dropdown" href="#"
                                                  data-toggle="dropdown"> 首页 </a>
                    <div class="dropdown-menu tab-content">
                        <a class="dropdown-item text-center" href="#section1">赛事信息</a>
                        <a class="dropdown-item text-center" href="#section2">热门赛事</a>
                        <a class="dropdown-item text-center" href="#section3">组队信息</a>
                        <a class="dropdown-item text-center" href="#section4">问答</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link w3ls-hover text-center" href="user_center.html">个人中心</a></li>
                <li class="nav-item"><a class="nav-link w3ls-hover text-center" href="team_manage.html">我的组队</a></li>
            </ul>
        </div>
    </nav>

    <div id="modal1">
        <div class="mbox">
            <div style="height: 10%"><span onclick="modalClose()"
                                           style="height:40px;float: right;font-size: 40px;cursor: pointer ">×</span>
            </div>
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
                    <input id="input2" name="num" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入数字"
                           required>
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

    <div id="sai_header">
        <div class="topUserSection">
            <div class="ren_img">
                <img class="img-fluid" src="images/head.png">
            </div>

            <div class="sai_ren" style="display: none;">

                <!-- 头像 -->
                <div style="
    margin: auto;
    height: 100%;
    width: 100%;
    display: inline-flex;
">
                    <div class="topUserInfoBtn">
                        <img src="images/ID.png"
                             style="position: absolute;padding-right: 10px;height: 40px;vertical-align: middle;">
                        <span id="userId"
                              style="margin: auto;vertical-align: middle;font-size: 27px;">2017210079</span>
                    </div>
                </div>
            </div>
            <div class="jie_right" style="">
                <div class="topUserBar"><img src="images/center.png" onclick="
            <?php if (!isset($_SESSION['user'])) echo "window.location.href='login.php'"; else  echo "window.location.href='user_center.html'"; ?>"><span
                            style="">个人中心</span></div>
                <?php if (isset($_SESSION['user'])) echo
                '<div class="topUserBar"><img onclick="window.location.href=\'team_manage.html\'" src="images/team.png"><span style="">我的队伍</span></div>
            <div class="topUserBar"><img src="images/create.png" onclick="modalOpen()"><span style="">创建队伍</span></div>
            <div class="topUserBar"><img src="images/logout.png" onclick="window.location.href=\'logout.php\'"><span style="">退出登录</span></div>' ?>
            </div>
        </div>
    </div>


<div class="container">

    <div id="sai_content">
        <div class="saishi">
            <div class="sai_left" id="section1">
                <h3>赛事信息</h3>
                <div class="sai_xin">
                    <div class="sai_xin_header">
                        <div class="sai_search">
                            <input class="sai_text" type="text" id="match" placeholder="请输入比赛关键字">
                            <img class="sai_submit" src="images/search.png">
                        </div>
                    </div>

                    <div id="hidden_info" style="display: none"><input title="" id="c_total_num"></div>

                    <div class="sai_xin_main">
                        <div class="sai_xin_main2" style="
    margin-left: 1%;
    margin-right: 1%;
">

                        </div>
                    </div>

                    <div class="saiPage">
                        <div class="pager">
                            <div class="page_left">
                                <img src="images/Previous.png">
                            </div>
                            <div class="page"><input type="button" value="1" style="font-weight: bold;"></div>
                            <div class="page"><input type="button" value="2"></div>
                            <div class="page"><input type="button" value="3"></div>
                            <div class="page"><input type="button" value="4"></div>
                            <div class="page"><input type="button" value="5"></div>
                            <div class="page_right">
                                <img src="images/Next.png">
                            </div>
                        </div>
                    </div>
                    <div class="saiAfterSearch">
                    </div>
                </div>

            </div>
            <div class="sai_right" id="section2">
                <h3>热门赛事</h3>
                <div class="contestRight">
                    <div class="sai_hot">
                        <div class="sai_hot_bg">

                            <div class="aaa">
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">1

                                        </button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>


                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">2
                                        </button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">3</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">4</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">5</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">6</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">7</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">8</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">9</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="sai_hot_detail">
                                    <div class="sai_hot_detail0">
                                        <button class="sai_hot_num">10</button>
                                        <div>
                                            <a href="#">哈哈哈哈哈哈哈哈哈</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sai_img">
                        <img src="images/aaa.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container third" id="section3">

        <h3>组队信息</h3>
        <form class="thirdHead" id="sForm" onsubmit="return false">
            <input type="text" id="organize" placeholder="请输入比赛或队伍关键字" name="content" class="search">
            <select title="" name="method" class="select1" size="1">
                <option value="1">比赛</option>
                <option value="2">队伍</option>
            </select>
            <img src="images/search.png" class="searchPic">
        </form>
        <div class="teamInfoSection0">
            <div class="teamInfoSection">
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage">11111111111111</div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>

                <div class="teamInfoCard">
                    <div class="teamInfoCardImage">222222222222</div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>

                <div class="teamInfoCard">
                    <div class="teamInfoCardImage">333333333333333333</div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>

                <div class="teamInfoCard">
                    <div class="teamInfoCardImage">444444444444444444444444</div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>

                <div class="teamInfoCard">
                    <div class="teamInfoCardImage">55555555555555</div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
                <div class="teamInfoCard">
                    <div class="teamInfoCardImage"></div>
                    <div class="teamInfoCardText"></div>
                </div>
            </div>
            <div class="teamInfoPage">
                <div class="teamInfoPaint"></div>
                <div class="teamInfoPaint"></div>
                <div class="teamInfoPaint"></div>
                <div class="teamInfoPaint"></div>
                <div class="teamInfoPaint"></div>
            </div>
        </div>

        <div class="teamInfoAfterSearch0">
            <div class="teamInfoAfterSearch">
                <div class="teamInfoAfterSearchLeft">
                    <img src="images/left.png">
                </div>
                <div class="teamInfoAfterSearchRight">
                    <img src="images/right.png">
                </div>
            </div>
        </div>
    </div>
    <div class="container fouth" id="section4" style=>
        <div class="fouthOne">
            <h3>问答</h3>
            <div class="answerOut">
                <div>
                    <div class="answer1">
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啦啦啦啦啦</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                    </div>
                    <div class="answer2" style="display: none;">
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                    </div>
                    <div class="answer3" style="display: none;">
                        <div><p><span class="answerLeft">这是第三页啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span></p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                    </div>
                    <div class="answer4" style="display: none;">
                        <div><p><span class="answerLeft">这是第四页</span><span class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                    </div>
                    <div class="answer5" style="display: none;">
                        <div><p><span class="answerLeft">这是第五页</span><span class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                        <div><p><span class="answerLeft">最后一个板块啊啊啊啊啊</span><span
                                        class="answerRight">问答【<span>0</span>】</span>
                            </p></div>
                    </div>
                </div>
                <div class="answerTurn">
                    <div class="pager"><input type="button" value="1"><input type="button" value="2"><input
                                type="button" value="3"><input type="button" value="4"><input type="button"
                                                                                              value="5"></div>


                </div>
            </div>
        </div>
        <div class="fouthTwo">
            <h3>我的问题</h3>
            <div class="myQuestionOut">
                <div class="myQuestion1" style="">
                    <div><p><span class="myQuestionLeft" id="question1">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                </div>
                <div class="myQuestion2" style="display: none;">
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢2</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span></p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                </div>
                <div class="myQuestion3" style="display: none;">
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢3</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span></p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                </div>
                <div class="myQuestion4" style="display: none;">
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢4</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span></p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                </div>
                <div class="myQuestion5" style="display: none;">
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢5</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span></p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                    <div><p><span class="myQuestionLeft">我们要提什么问题呢</span><span
                                    class="myQuestionRight">问答【<span>0</span>】</span>
                        </p></div>
                </div>
                <div class="myQuestionTurn">
                    <div class="pager"><input type="button" value="1"><input type="button" value="2"><input
                                type="button" value="3"><input type="button" value="4"><input type="button"
                                                                                              value="5"></div>


                </div>
                <div class="discuss">
                    <div>
                        <input type="text" class="disleft1" placeholder="请输入问题...">
                        <textarea placeholder="请输入问题...." class="disleft2" rows="3" cols="35"></textarea></div>
                    <button type="submit" class="disright"><img src="images/send.png"> 发送</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="js/Pagination.js"></script>
<script src="js/index.js"></script>
</body>
</html>