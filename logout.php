<?php
session_start();
if(!empty($_SESSION['login_user']))
{
$_SESSION['login_user']='';
}
echo "<meta http-equiv='refresh' content='0; url=index.php'>"; ?>

?>
