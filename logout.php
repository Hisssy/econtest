<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/4/25
 * Time: 22:54
 */

include 'session.php';
session_set_save_handler('_session_open','_session_close','_session_read','_session_write','_session_destroy','_session_gc');
session_start();
session_destroy();
echo "<script>window.location.href='index.php'</script>";
