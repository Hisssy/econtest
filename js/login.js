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
console.log($('#sectionBoxLogin'));
$('#findBackBtn').click(function () {

    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "PwdFind.php?action=check_user",
        data: $('#aForm').serialize(),
        success: function (result) {
            $('#sectionBoxFindBack').hide();
            $('#sectionBoxFindBack2').show();
            if(result.msgCode===0){
                alert("错误");
            }
        }
    })
});