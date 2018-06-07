// JavaScript Document

let newInput7 = $('<input type="text" name="phone"/>');
let newInput3 = $('<input type="text" name="email" />');
let newInput5 = $('<input type="text"  name="qq"/>');
let newInput0 = $('<input form="cForm" type="text" style="width: 40%" name="info" />');

$(document).ready(function () {
    $("#post").click(function () {
        $("#btn_file").click();
    });
    $('.endButton').click(function () {
        let btn = $(".endButton");
        let tmp = btn.val();
        if (tmp === "提交资料") {
            $.ajax({
                url: 'centerModify.php?action=infoModify',
                type: 'POST',
                data: $("#cForm").serialize(),
                dataType: 'json',
                success: function (json) {
                    if (json.MsgCode = 1)
                        alert('成功');
                    else
                        alert('失败');
                }
            });
        }
        else {
            btn.val("提交资料");
            let sp = $(".changeable");
            sp.remove();
            $(".infor3 p").append(newInput3);
            $(".infor5 p").append(newInput5);
            $(".infor7 p").append(newInput7);
            $(".infor0").append(newInput0);
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
            if (xhr.readyState === 4 && xhr.status === 200) {
                //
            }
        };

    }
}

