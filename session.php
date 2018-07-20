<?php
include 'configure.php';
$handle = mysqli_connect("$db_host", "$db_user", "$db_pwd") or die('数据库连接失败');

class MySessionHandler implements SessionHandlerInterface
{
    public function open($savePath, $sessionName)
    {
        global $handle;
        global $db_name;
        mysqli_select_db($handle, "$db_name") or die('数据库无此库');
        return (true);
    }

    public function close()
    {
        return true;
    }

    public function read($key)
    {
        global $handle;
        $time = time();
        $sql = "select session_data from session where session_key='$key' and session_time>$time";
        $result = mysqli_query($handle, $sql);
        $row = mysqli_fetch_array($result);
        if ($row) {
            return ($row['session_data']);
        } else {
            return ("false");
        }
    }

    public function write($key, $data)
    {
        global $handle;
        $time = 60 * 60;
        $lapse_time = time() + $time;
        $sql = "select session_data from session where session_key='$key' and session_time>$time";
        $result = $handle->query($sql);
        if (mysqli_num_rows($result) == 0) {
            $sql = "insert into session values('$key','$data',$lapse_time)";
            $result = mysqli_query($handle, $sql);
        } else {
            $sql = "update session set session_key = '$key',session_data ='$data',session_time=$lapse_time where session_key='$key'";
            $result = mysqli_query($handle, $sql);
        }
        return ($result);
    }

    public function destroy($key)
    {
        global $handle;
        $sql = "delete from session where session_key='$key'";
        $result = mysqli_query($handle, $sql);
        return ($result);
    }

    public function gc($maxlifetime)
    {
        global $handle;
        $lapse_time = time();
        $sql = "delete from session where expiry_time<$lapse_time";
        $result = mysqli_query($handle, $sql);
        return ($result);
    }
}

$handler = new MySessionHandler();
session_set_save_handler($handler,true);