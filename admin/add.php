
<html>
<body>
<form action="insert.php" method="post"
enctype="multipart/form-data">
<label for="file">比赛图片:</label>
<input type="file" name="file" id="file" />
<br />
  <table width="512" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="right">大赛名称：</td>
  <td height="24" align="left"><input name="name" type="text" id="name" size="20"></td>
  </tr>
  <tr>
    <td height="24" align="right">大赛主题：</td>
  <td height="24" align="left"><input name="intro" type="text" id="intro" size="20"></td>
  </tr>
  <tr>
    <td height="24" align="right">大赛链接：</td>
  <td height="24" align="left"><input name="url" type="text" id="url" size="20"></td>
  </tr>
  <tr>
    <td height="24" align="right">开始时间：</td>
  <td height="24" align="left"><input name="begin" type="text" id="begin" size="20"></td>
  </tr>
  <tr>
    <td height="24" align="right">结束时间：</td>
  <td height="24" align="left"><input name="stop" type="text" id="stop" size="20"></td>
  </tr>
  <tr>
    <td height="24" align="right">比赛人数：</td>
  <td height="24" align="left"><input name="num" type="text" id="num" size="20"></td>
  </tr>
  <tr align="center">
    <td height="24" colspan="2"><input type="submit" name="Submit" value="添加" onClick="return check(form);"></td>
  </tr>
</form>
<a href='index.php'>返回</a>
</body>
</html>
