<?php
if(isset($_SESSION['id'])){
	$db=mysqli_connect("localhost","root","Paul_1993","askq");
	if(mysqli_connect_errno()){
	print("Connect Database Failed");
	exit();
	}
}
?>