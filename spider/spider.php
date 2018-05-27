
<meta charset="utf-8">
<?php
include '../configure.php';
set_time_limit(0);
$hand = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');
mysqli_select_db($hand, "$db_name") or die('数据库无此库');
$myfile = fopen("class.txt", "r") or die("Unable to open file!");
while(!feof($myfile))
{
  $class=fgets($myfile);//按行读取
  $class=trim($class);//去除换行符
  $url = "http://jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj="."$class";//bj为班级编号，可以替换
  $contents = file_get_contents($url);
  //如果出现中文乱码使用下面代码
  //$getcontent = iconv("gb2312", "utf-8",$contents);
  preg_match_all("/<td>(.*?)<\/td>/",$contents,$match);
  $i=10;
  while($match[0][$i])
  {
      $num='000000';//初始密码
      $user=strip_tags($match[0][$i+1]);//学号
      $nickname=strip_tags($match[0][$i+2]);//姓名
      $major=strip_tags($match[0][$i+6]);//专业
      $school=strip_tags($match[0][$i+7]);//学院
      $password=md5($num);
      $sql="insert into account_user (`user`,`email`, `nickname`,`major`,`school`,`password`,`priv`) values('$user','0','$nickname','$major','$school','$password',1)";//邮箱初始为0
      $result = mysqli_query($hand, $sql);
      $i=$i+10;
  }
}
fclose($myfile);
