// JavaScript Document

function reload(id) {
    let obj = document.getElementById(id);
    let url = "verification.php";
    obj.src = url + "?time=" + new Date().getTime();
}

function ajaxPost(url) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
        data: $('#tform').serialize(),
        success: function (result) {
            if (result.msgCode === '1') {
                alert("提交成功！");
                modalClose();
            }
            else if (result.msgCode === '0')
                alert("队名重复！");
            else if (result.msgCode === '2') {
                alert('请登录！');
                modalClose();
            }
            else
                alert("服务器错误！");
        }
    })
}

function modalOpen() {
    let obj = document.getElementById('modal1');
    obj.style.display = 'block';
}

function modalClose() {
    let obj = document.getElementById('modal1');
    obj.style.display = 'none';
}

function bbsPost(url) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
        data: $('#tw1').serialize(),
        success: function (result) {
            if (result.msgcode === 1)
                alert("发布成功！");
            else if (result.msgcode === 0)
                alert("数据库错误");
            else if (result.msgcode === 3) {
                alert("验证码错误，请重新输入");
                captchaReload();
            }
            else if (result.msgcode === 2) {
                alert("请输入内容！");
            }
            else alert("未知错误！");
        }
    })
}

function search(url) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
        data: $('#sform').serialize(),
        success: function (result) {
            function htm(tcname, contest, peoplenum) {
                return '                <div class="xialatiao1">\n' +
                    '                    <img src="images/tu.png" class="xialatiao_image">\n' +
                    '                    <div class="example">\n' +
                    '                        <h4 class="title">队长：<span>' + tcname + '</span></h4>\n' +
                    '                        <div class="ec">\n' +
                    '                            <p>赛事名称：<span>' + contest + '</span></p>\n' +
                    '                            <p>成员数目：<span>' + peoplenum + '</span></p>\n' +
                    '                            <p>加入队伍</p>\n' +
                    '                            <p>关注队伍</p>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>';
            }

            if (result[0] == false) {
                alert('没有找到相关信息！');
            } else {
                let obj = $('.xialatiao1');
                obj.remove();
                let div = $('.xiala1');
                for (let i = 0; i < result.length; i++) {
                    div.append(htm(result[i].tcname, result[i].contest, result[i].peoplenum));
                }
            }
        },
    });
}