<?php
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");
require("../PHPMailer/src/Exception.php");
class MailSend{
    private $username="397053880@qq.com";
    private $password="zkcqefipcsqmcahh";
    var $address;
    var $title;
    var $body;
    function __construct( $par1, $par2, $par3 )//输入值分别为收件地址，标题，正文
    {
        $this->address = $par1;
        $this->title = $par2;
        $this->body =$par3;
    }
    function send()
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();

        $mail->CharSet="UTF-8";
        $mail->Host = "smtp.qq.com";
        $mail->SMTPDebug = 1;
        $mail->Port = 465 ; //端口号465 or 587

        $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
        $mail->SMTPAuth = true;
        $mail->IsHTML(true);

        //Authentication
        $mail->Username = $this->username;//发件邮箱
        $mail->Password = $this->password;

        //Set Params
        $mail->SetFrom($this->username,"重邮微校");//发件邮箱
        $mail->AddAddress($this->address);//收件邮箱
        $mail->Subject = $this->title;//标题
        $mail->Body = $this->body;//正文
        $mail->Send();
    }
}
