<?php
if(isset($_COOKIE['id'])){
	header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/home/HomePage.php');
}else{
	header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
?>