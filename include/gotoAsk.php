<?php
if(isset($_COOKIE['id'])){
	header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/askq/ask.html');
}else{
	header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
?>