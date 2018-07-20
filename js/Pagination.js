// JavaScript Document
//字体 #666 小字体#333
$('.ren_img').click(function () {
    $('.sai_ren').animate({"width": "toggle"}, 350);
});
$('.sai_detail').mouseleave(function () {
    $(this).css('background-color', '#fff');
});

//获取比赛信息
//init
$(document).ready(function(){
    function genCHtml(name,intro,pic){
        let html='                            <div class="sai_detail">\n' +
            '                                <div class="sai_detail_img">\n' +
            '                                    <img src="images/'+pic+'">\n' +
            '                                </div>\n' +
            '                                <div class="sai_detail_right">\n' +
            '                                    <div class="sai_detail_name">\n' +
            '                                        <p>\n' +name+
            '</p>\n' +
            '                                    </div>\n' +
            '                                    <div class="sai_detail_jie">\n' +
            '                                            <span>\n' +intro+
            '</span>\n' +
            '                                    </div>\n' +
            '                                    <a href="#" class="sai_detail_url">查看详情...'+
            '</a>\n' +
            '                                </div>\n' +
            '                            </div>';
        $('.sai_xin_main2').append(html);
    }

    function genTHtml(t_name,tcname,pnum){
        let html='<div class="teamInfoCard">\n' +
            '                    <div class="teamInfoCardImage"></div>\n' +
            '                    <div class="teamInfoCardText">\n' +
            '                        <div class="cardWrapper">\n' +
            '                            <div class="teamInfoCardTextTitle"><span class="title">'+t_name+'</span></div>\n' +
            '                            <div class="cardTextEntry">队长：'+tcname+'</div>\n' +
            '                            <div class="cardTextEntry">队伍人数：'+pnum+'</div>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>';
        $('.teamInfoSection').append(html);
    }

    $.ajax({
        url:'contest_list.php?action=contest',
        dataType:'json',
        type:'post',
        data:{c_page:1},
        success:function (data) {
            $('#c_total_num').val(data.allnum);
            console.log(data);
            $.each(data, function (index, objVal) {
                genCHtml(objVal.name,objVal.intro,objVal.pic);
            })
        }
    });

    $.ajax({
        url:'contest_list.php?action=team',
        dataType:'json',
        type:'post',
        data:{c_page:1},
        success:function (data) {
            $('#t_total_num').val(data.allnum);
            console.log(data);
            let temp=0;
            $.each(data, function (index, objVal) {
                temp++;
                if(temp===5)
                    return false;
                genTHtml(objVal.name,objVal.tc_name,objVal.people);
            })
        }
    });
    //-----------------------------------------比赛搜索----------------------------------------------
    let match = document.getElementById('match');

    function ajaxMatchPost() {
        $.ajax({
            type: 'post',
            url: 'search.php?action=contest',
            dataType: "JSON",
            data: {
                content: match.value
            },
            success: function (data) {
                //清空
                $('.sai_xin_main2').html('');
                //生成
                $.each(data, function (index, objVal) {
                    genCHtml(objVal.name,objVal.intro,objVal.pic);
                })
            },
            error: function () {
                alert('error');
            }
        })
    }

    document.getElementsByClassName('sai_submit')[0].onclick = function () {
        if (match.value === "") {
            alert('请输入关键字');
        } else {
            ajaxMatchPost();
        }
    };

    let teamInfoAfterSearch = document.getElementsByClassName('teamInfoCardSearch');
    let flag2 = 0;
    let str = "<div class='teamInfoCardSearch'>\n" +
        "                <div class='teamInfoCardImageSearch'></div>\n" +
        "                <div class='teamInfoCardTextSearch'></div>\n" +
        "                </div>";


    function ajaxOrganizePost() {
        $.ajax({
            type: 'POST',
            url: 'try0.php',
            dataType: 'JSON',
            data: $('#sForm').serialize(),
            success: function (data) {
                //display
                $('.teamInfoSection0').css('display', 'none');
                $('.teamInfoAfterSearch0').css('display', 'block');

                //生成
                if (data.length <= 4) {   //  <=4  不显示箭头
                    for (let i = 0; i < data.length; i++) {
                        $('.teamInfoAfterSearch').prepend(str);
                    }
                } else {  //  >4  显示箭头
                    $('.teamInfoAfterSearch').mouseenter(function () {
                        $('.teamInfoAfterSearchLeft').css('display', 'block');
                        $('.teamInfoAfterSearchRight').css('display', 'block');
                    });
                    $('.teamInfoAfterSearch').mouseleave(function () {
                        $('.teamInfoAfterSearchLeft').css('display', 'none');
                        $('.teamInfoAfterSearchRight').css('display', 'none');
                    });
                    //添加DOM
                    for (let i = 0; i < data.length; i++) {
                        $('.teamInfoAfterSearch').prepend(str);
                    }
                    //清空
                    $('.teamInfoCardSearch').css('display', 'none');
                    //显示
                    for (let i = 0; i < 4; i++) {
                        document.getElementsByClassName('teamInfoCardSearch')[i].style.display = 'block';
                    }
                    //左右箭头点击事件
                    document.getElementsByClassName('teamInfoAfterSearchRight')[0].onclick = function () {
                        flag2++;
                        if (flag2 === Math.ceil(data.length / 4)) {
                            flag2 = 0;
                        }
                        $('.teamInfoCardSearch').css('display', 'none');
                        for (let i = flag2 * 4; i < flag2 * 4 + 4 && i < data.length; i++) {
                            document.getElementsByClassName('teamInfoCardSearch')[i].style.display = 'block';
                        }
                    };
                    document.getElementsByClassName('teamInfoAfterSearchLeft')[0].onclick = function () {
                        flag2--;
                        if (flag2 === -1) {
                            flag2 = Math.ceil(data.length / 4) - 1;
                        }
                        $('.teamInfoCardSearch').css('display', 'none');
                        for (let i = flag2 * 4; i < flag2 * 4 + 4 && i < data.length; i++) {
                            document.getElementsByClassName('teamInfoCardSearch')[i].style.display = 'block';
                        }
                    };
                }

            },
            error: function () {
                alert('error');
            }
        })
    }

    document.getElementsByClassName('searchPic')[0].onclick = function () {
        if (organize.value === "") {
            alert('请输入关键字');
        } else {
            ajaxOrganizePost();
        }
    };
});

//-------------------------------------------比赛 翻页---------------------------------------
// let saiMain = document.getElementsByClassName('sai_xin_main');
// let page = document.getElementsByClassName('page');
// let sai_detail = document.getElementsByClassName('sai_detail');
// let i = 0;
// pageHidden(sai_detail);
//
// function pageShow() {
//     for (let n = i * 5; n < i * 5 + 5 && n < sai_detail.length; n++) {
//         sai_detail[n].style.display = 'block';
//     }
//     page[i].getElementsByTagName('input')[0].style.fontWeight = 'bold';
// }
//
// function pageHidden(x) {
//     for (let i = Math.ceil(x.length / 5); i < page.length; i++) {
//         page[i].style.display = 'none';
//     }
// }
//
// function pageClick(x) {
//     i = 0;
//     $('.page_right').click(function () {
//         for (let i = 0; i < x.length; i++) {
//             x[i].style.display = 'none';
//         }
//         $('.page input').css('font-weight', 'normal');
//         i++;
//         if (i === Math.ceil(x.length / 5)) {
//             i = 0;
//         }
//         pageShow();
//     });
//     $('.page_left').click(function () {
//         for (let i = 0; i < x.length; i++) {
//             x[i].style.display = 'none';
//         }
//         $('.page input').css('font-weight', 'normal');
//
//         i--;
//         if (i === -1) {
//             i = Math.ceil(x.length / 5) - 1;
//         }
//         pageShow();
//     });
//     $('.page').click(function () {
//         $('.page input').css('font-weight', 'normal');
//
//         for (let i = 0; i < x.length; i++) {
//             x[i].style.display = 'none';
//         }
//         i = parseInt(this.getElementsByTagName('input')[0].value) - 1;
//         pageShow();
//     });
// }
//
// pageClick(sai_detail);




//-----------------------------------------队伍搜索---------------------------------------------


//-----------------------------------轮播---------------------------------
// let teamInfoPaint = document.getElementsByClassName('teamInfoPaint');
// let flag = 0;
// let times;
// teamInfoPaint[0].style.backgroundColor = "#8c8d8d";
//
// function teamInfoCardPlay() {
//     //清空
//     for (let i = 0; i < teamInfoCard.length; i++) {
//         teamInfoCard[i].style.display = 'none';
//     }
//     //显示
//     for (let n = flag * 4; n < flag * 4 + 4; n++) {
//         teamInfoCard[n].style.display = 'block';
//     }
// }
//
// function self() {
//     teamInfoCardPlay();
//     pointColor();
//     flag++;
//     if (flag === 5) {
//         flag = 0;
//     }
// }
//
// function play() {
//     teamInfoCardPlay();
//     flag++;
//     if (flag === 5) {
//         flag = 0;
//     }
//     //定时器
//     times = setInterval(self, 2000);
// }
//
// //圆点背景颜色
// function pointColor() {
//     for (let n = 0; n < teamInfoPaint.length; n++) {
//         teamInfoPaint[n].style.backgroundColor = '';
//     }
//     teamInfoPaint[flag].style.backgroundColor = "#8c8d8d";
// }
//
// //圆点点击事件
// for (let k = 0; k < teamInfoPaint.length; k++) {
//     teamInfoPaint[k].onclick = function () {
//         clearTimeout(times);
//         flag = k;
//         pointColor();
//         play();
//     }
// }
//
// play();
//
// //鼠标移入
// $('.teamInfoSection').mouseenter(function () {
//     clearTimeout(times);
// });
// //鼠标移出
// $('.teamInfoSection').mouseleave(function () {
//     times = setInterval(self, 3000);
// });
//
//
//
//
//
//
//
//










