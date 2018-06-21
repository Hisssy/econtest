<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的组队</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/team_manage.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<script>

    $(document).ready(function () {
        $.ajax({
            type: "post",
            url: 'try0.json',
            dataType: 'JSON',
            success: function (data) {
                if (data.length) {
                    for (let i = 0; i < data.length - 1; i++) {
                        $('.f_zu_dui').prepend("<div class='zu_dui'>" + $('.zu_dui').html() + "</div>");
                    }

                    $('.zu_dui0').click(function () {
                        getSpecTeamInfo($(this));
                        $(this).children('.zu_mem').slideToggle("slow");
                    });
                }
                let zu_name = document.getElementsByClassName('zu_name');
                let zu_game = document.getElementsByClassName('zu_game');
                let zu_time = document.getElementsByClassName('zu_time');
                let zu_num = document.getElementsByClassName('zu_num');

                for (let i = 0; i < data.length; i++) {
                    zu_name[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamId'];
                    zu_game[i].getElementsByTagName('p')[0].innerHTML = data[i]['ContestName'];
                    zu_time[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamEnrollDate'];
                    zu_num[i].getElementsByTagName('p')[0].innerHTML = data[i]['TeamPeopleNum'];
                }
            }
        });
    });
    // $.ajax({
    //     type: 'get',
    //     url: 'zudui.html',
    //     dataType: 'html',
    //     success:
    //
    //         //翻页做不出
    //         if (x.length > 4) {
    //             $('.zu_page p').css('display', 'block');
    //         }
    //     }
    // })
    function getSpecTeamInfo(thisObj) {
        if (thisObj.hasClass("active"))
            thisObj.removeClass("active");
        else {
            thisObj.addClass('active');
            let name = thisObj[0].firstElementChild.children[0].children[0].innerHTML;
            $.ajax({
                type: "get",
                url: 'try1.json',
                dataType: 'JSON',
                data: {
                    teamName: name
                },
                success: function (data) {
                    let mem = thisObj[0].getElementsByClassName("mem_zi");
                    let img = thisObj[0].getElementsByClassName("mem_img");
                    let memData = data;
                    // document.getElementsByClassName('zu_mem')[0].style.height=255*Math.ceil(memData.length/4)+'px';
                    let jObj = $(thisObj[0].getElementsByClassName("zu_mem")[0]);
                    let html1 = "<div class='mem1'>" + $('.mem1').html() + "</div>";
                    jObj.empty();
                    for (let i = 0; i < memData.length; i++) {
                        jObj.prepend(html1);
                    }
                    for (let i = 0; i < memData.length; i++) {

                        img[i].getElementsByTagName('img')[0].src = memData[i]['MemberPic'];
                        mem[i].getElementsByTagName('p')[0].innerHTML = "ID：" + memData[i]['MemberName'];
                        mem[i].getElementsByTagName('p')[1].innerHTML = "团队角色：" + memData[i]['MemberStatus'];
                        mem[i].getElementsByTagName('p')[2].innerHTML = "QQ:" + memData[i]['MemberQQ'];
                    }

                }

            });
        }

    }


</script>
<body>
<?php require 'nav.html'?>
<div id="main">
    <div class="zu_header">
        <p>
            <a href="">首页</a>
            >>
            <a href="">赛事专区</a>
            >>
            我的组队
        </p>
    </div>
    <div class="zu_content">
        <div class="zu_biaoti_bg">
            <div class="zu_biaoti">
                <div>
                    <p>队伍名称</p>
                </div>
                <div>
                    <p>比赛名称</p>
                </div>
                <div>
                    <p>报名时间</p>
                </div>
                <div>
                    <p>成员数目</p>
                </div>
                <div>
                    <p>操作</p>
                </div>
            </div>
        </div>

        <div class="f_zu_dui">
            <div class="zu_dui">
                <div class="zu_dui0">
                    <!-- 点击 -->
                    <div class="dui_header" onclick="zu_header()">
                        <div class="zu_name">
                            <p>居居居</p>
                        </div>
                        <div class="zu_game">
                            <p>2018中国旅游商品大赛</p>
                        </div>
                        <div class="zu_time">
                            <p>3月20日-5月15日</p>
                        </div>
                        <div class="zu_num">
                            <p>3/10</p>
                        </div>
                        <div class="zu_action">
                            <p>解散队伍</p>    <!-- ajax （队长）解散    （队员）退出 -->
                        </div>
                    </div>
                    <!-- JS显示 隐藏 -->
                    <div class="zu_mem">
                        <div class="mem1">
                            <div class="duizhang">
                                <div class="mem_img">
                                    <img src="">
                                </div>
                                <div class="mem_zi">
                                    <p>ID：居居</p>
                                    <p>团队角色：队长</p>
                                    <p>QQ:2370xxxxx9</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zu_page">
            <p>< x > &nbsp;&nbsp;跳转至 <input title="" type="text">页 &nbsp;共x页</p>
        </div>
    </div>

</div>

<script>
    let p = 1;

    function zu_header() {
        let zu_name = document.getElementsByClassName('zu_name');
        if (p) {

            p = 0;
        }
    }
</script>

</body>
</html>