<?php
$db=mysqli_connect("localhost","root","Paul_1993","askq");
if(mysqli_connect_errno()){
	print("Connect Database Failed");
	exit();
}

$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * from user where email = '$email' and password='&password'";
$result=mysqli_query($db,$query);
$row=msql_fetch_array($result);

?>