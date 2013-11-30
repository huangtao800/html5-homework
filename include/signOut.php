<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
?>