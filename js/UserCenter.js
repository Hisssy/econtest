// JavaScript Document

let button = document.getElementsByClassName("endButton");
let newInput0 = $('<input type="text" />');
let newInput3 = $('<input type="text"/>');
let newInput5 = $('<input type="text"/>');
let newInput7 = $('<input type="text"/>');
let temp = 0;

//此处还有bug
$(document).ready(function () {
    $("#post").click(function () {
        $("#btn_file").click();
    });
    $('.endButton').click(function () {
        if (temp === 0) {
            $(".endButton").val("提交资料");
            let sp = $("span");
            sp.remove(".change3");
            sp.remove(".change5");
            sp.remove(".change7");
            sp.remove(".change0");
            $(".infor3 p").append(newInput3);
            $(".infor5 p").append(newInput5);
            $(".infor7 p").append(newInput7);
            $(".infor0").append(newInput0);
            newInput3.addClass("form3");
            newInput5.addClass("form5");
            newInput7.addClass("form7");
            newInput0.addClass("form0");
            temp = 1;
        } else {
            $.ajax({
                url: 'centerModify.php?action=infoModify',
                data: {
                    phone: $("form3").val(),
                    email: $("form5").val(),
                    qq: $("form7").val(),
                    info: $("form0").val()
                },
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    if(json.MsgCode=1)
                        alert('成功');
                    else
                        alert('失败');
                }
            });
        }
    });
});

function fileChange(target) {
    let fileSize = target.files[0].size;
    let size = fileSize / 1024;
    if (size > 500) {
        alert("附件不能大于500kb");
    }
    else {
        // let file = document.querySelector('[type=file]');
        let form = new FormData();
        form.append('upload', target.files[0]);
        let xhr = new XMLHttpRequest;
        xhr.open('post', 'centerModify.php?action=portraitUpload');
        // 监听上传进度
        xhr.upload.onprogress = function (ev) {
            // 事件对象
            // console.log(ev);

            let percent = (ev.loaded / ev.total) * 100 + '%';

            console.log(percent);

            // progress.style.width = percent;
        };

        xhr.send(form);

        xhr.onreadystatechange = function () {
            if(xhr.readyState === 4 && xhr.status === 200) {
                //
            }
        };

    }
}

