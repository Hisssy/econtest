<!DOCTYPE html>
<html>
<body>
<form name="form1" method="post" action="check.php">
  <table width="521" height="394" border="0" cellpadding="0" cellspacing="0">
    <tr>
	  <td valign="top" background="images/login.jpg">
	    <table width="512" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td height="24" align="right">用户名：</td>
			<td height="24" align="left"><input name="user" type="text" id="user" size="20"></td>
		  </tr>
		  <tr>
		    <td height="24" align="right">密&nbsp;&nbsp;码：</td>
			<td height="24" align="left"><input name="pwd" type="password" id="pwd" size="20"></td>
		  </tr>
		  <tr align="center">
		    <td height="24" colspan="2"><input type="submit" name="Submit" value="提交" onClick="return check(form);"><input type="reset" name="Submit2" value="重填"></td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
</body>
</html>
