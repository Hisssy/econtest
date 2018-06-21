function verifyInfo1(pwd) {
    let obj=document.getElementById('input-rePwd').value;
    let obj2=document.getElementById('reInputPass');
    if (pwd!==obj){
        obj2.innerHTML="";
        obj2.append("密码输入不一致");
    }
    else {
        obj2.innerHTML="";
    }
}
function verifyInfo(pwd) {
    let obj=document.getElementById('input-pwd').value;
    let obj2=document.getElementById('reInputPass');
    if (pwd!==obj){
        obj2.innerHTML="";
        obj2.append("密码输入不一致");
    }
    else {
        obj2.innerHTML="";
    }
}

function findBackPwd() {
    $('#sectionBoxLogin').hide();
    $('#sectionBoxFindBack').show();
}

$('#findBackBtn').click(function () {

    if($('#input-code').val())
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "PwdFind.php?action=check_user",
        data: $('#aForm').serialize(),
        success: function (result) {
            if(result.msgCode===1){
                $('#sectionBoxFindBack').hide();
                $('#sectionBoxFindBack2').show();
            }
            else
                alert("错误");
        }
    })
});

function reSend() {
    if($('#input-code').val())
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "PwdFind.php?action=check_user",
            data: $('#aForm').serialize(),
            success: function (result) {
                if(result.msgCode===1){
                }
                else
                    alert("错误");
            }
        })
}