<?php
include 'session.php';
session_start();
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
$hand->select_db("$db_name") or die('数据库无此库');
?>

<!DOCTYPE HTML>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <title>赛事专区</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/contest.css">
</head>
<body>
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

            <div class="topUserBar"><img src="images/center.png"><span style="">个人中心</span></div>
            <div class="topUserBar" style="
    /* position: relative; */
"><img src="images/team.png"><span style="">我的队伍</span></div>
            <div class="topUserBar"><img src="images/create.png"><span style="">创建队伍</span></div>

        </div>
    </div>
</div>
<div class="container">

    <div id="sai_content">
        <div class="saishi">
            <div class="sai_left">
                <h3>赛事信息</h3>
                <div class="sai_xin">
                    <div class="sai_xin_header">
                        <div class="sai_search">
                            <input class="sai_text" type="text" id="match" placeholder="请输入比赛关键字">
                            <img class="sai_submit" src="images/search.png">
                        </div>
                    </div>

                    <div class="sai_xin_main">
                        <div class="sai_xin_main2" style="
    margin-left: 1%;
    margin-right: 1%;
">
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>

                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>

                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>

                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">互联网+创新创业大赛</p>
                                    </div>

                                    <div class="sai_detail_jie">
                                            <span style="
    font-size: small;
">
第四届大赛要力争做到“有广度、有高度、有深度、有温度”，努力体现有突破、有特色、有新意。扩大参赛规模，实现区域、学校、学生类型全覆盖和国际赛道拓展；广泛实施“青年红色筑梦之旅”活动，培养有理想、有本领、有担当的热血青春力量；壮大创新创业生力军，服务创新驱动发展、“一带一路”建设、乡村振兴和脱贫攻坚等国家战略。                                            </span>
                                    </div>
                                    <a href="#" class="sai_detail_url" style="
    text-align: end;
    color: #757575;
    /* width: 10%; */
    /* justify-self: end; */
    font-size: 12px;
">查看详情...</a>
                                </div>
                            </div>
                            <div class="sai_detail" style="background-color: rgb(255, 255, 255);">
                                <div class="sai_detail_img">
                                    <img src="images/test.png">
                                </div>
                                <div class="sai_detail_right">
                                    <div class="sai_detail_name">
                                        <p style="
    color: #212121;
">xxxxxxxxxxxxxxxxxxxxxxxx大赛</p>
                                    </div>
                                    <div class="sai_detail_time">
                                        报名时间：<span>xxxx--xxxx</span>
                                    </div>
                                    <div class="sai_detail_jie">
                                        <p>
                                            xxx
                                        </p>
                                    </div>
                                    <!--<div class="sai_detail_more"><a href="#">查看详情</a></div>-->
                                </div>
                            </div>


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
            <div class="sai_right">
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

    <div class="container third">

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
    <div class="container fouth" style=>
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

</body>
</html>