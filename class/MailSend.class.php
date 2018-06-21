<?php
define('Root_Path',dirname(__FILE__));
require(Root_Path."\..\PHPMailer\src\PHPMailer.php");
require(Root_Path."\..\PHPMailer\src\SMTP.php");
require(Root_Path."\..\PHPMailer\src\Exception.php");
require(Root_Path."\password.php");
class MailSend{
    private $username="397053880@qq.com";
    var $address;
    var $title;
    var $body;
    function __construct( $par1, $par2, $par3 )//输入值分别为收件地址，标题，正文
    {
        $this->address = $par1;
        $this->title = $par2;
        $this->body =$par3;
    }
    function send($unspoken)
    {
        ob_start();
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
        $mail->Password = $unspoken;

        //Set Params
        try {
            $mail->SetFrom($this->username, "重邮微校");
        } catch (\PHPMailer\PHPMailer\Exception $e) {
        }//发件邮箱
        $mail->AddAddress($this->address);//收件邮箱
        $mail->Subject = $this->title;//标题
        $mail->Body = $this->body;//正文
        try {
            $mail->Send();
        } catch (\PHPMailer\PHPMailer\Exception $e) {
        }
         ob_end_clean();
    }
}
