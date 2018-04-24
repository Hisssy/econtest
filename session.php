<?php
function _session_open($save_path,$session_name)
{
	global $handle;
	$handle=mysqli_connect('localhost','root','980919')or die('数据库连接失败');
	mysqli_select_db($handle,'chewei')or die('数据库无此库');
	return(true);
}
function _session_close()
{
	global $handle;
	return(true);
}
function _session_read($key)
{
	global $handle;
	$time=time();
	$sql="select session_data from session where session_key='$key' and session_time>$time";
    $result=mysqli_query($handle,$sql);
    $row=mysqli_fetch_array($result);
    if($row)
	{
        return($row['session_data']);
    }
    else
    {
        return(false);
    }
}
function _session_write($key,$data)
{
	global $handle;
	$time=60*60;
	$lapse_time=time()+$time;
	$sql="select session_data from session where session_key='$key' and session_time>$time";
	$result=$handle ->query($sql);
	if(mysqli_num_rows($result)==0)
	{
		$sql="insert into session values('$key','$data',$lapse_time)";
		$result=mysqli_query($handle,$sql);
	}
	else
	{
		$sql="update session set session_key = '$key',session_data ='$data',session_time=$lapse_time where session_key='$key'";
		$result=mysqli_query($handle,$sql);
	}
	return($result);
}
function _session_destroy($key)
{
	global $handle;
	$sql="delete from session where session_key='$key'";
	$result=mysqli_query($handle,$sql);
	return($result);
}
function _session_gc($expiry_time)
{
	global $handle;
	$lapse_time=time();
	$sql="delete form session where expiry_time<$lapse_time";
	$result=mysqli_query($handle,$sql);
	return($result);
}
?>