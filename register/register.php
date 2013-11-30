<?php
session_start();
require_once("../include/mysql_connect.php");
$isRegistered=0;
if(isset($_POST['submitted'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$userName=$_POST['userName'];
	$insertString="INSERT INTO user(email,password,name) VALUES ('$email','$password','$userName')";
	$result=mysqli_query($db,$insertString);
	$id=mysqli_insert_id($db);
	//print ("$result and $id");
	if($id!=0){
		$_SESSION["id"]=$id;
		header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
	}else{
		$isRegistered=1;
	}
}
?>
<html>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Register</title>
	<link href="../dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../css/common.css">
	<script src="submit.js"></script>
</head>

<body>
	<div class="container">

		<h1>Welcome to <img src="../login/logo.png"></h1>
		<div id="formContainer">
			<form action="register.php" method="post" onsubmit="return checkPassword()">
				<div class="component">
					<label for="email">E-mail address</label>
					<input type="email" class="form-control" placeholder="Email address" required autofocus id="email" name="email" value="<?php if(isset($_POST['submitted'])) echo $_POST['email']?>">
					<?php
					if($isRegistered==1){
						print("<p class='tipStyle'>该邮箱已经注册！</p>");
					}
					?>
				</div>
				<div class="component">
					<label for="name">User Name</label>
					<input type="text" class="form-control" placeholder="User name" required id="name" name="userName" value="<?php if(isset($_POST['submitted'])) echo $_POST['userName']?>">
				</div>
				<div class="component">
					<label for="password">Password</label>
					<input type="password" class="form-control" placeholder="Password"  required id="password" name="password">
				</div>
				<div class="component" id="appendPassword">
					<label for="confirmPassword">Confirm your password</label>
					<input type="password" class="form-control" placeholder="Password again" required id="confirmPassword" name="confirmPassword">
					
				</div>
				<div class="component" id="submitComponent">
					<button class="btn btn-lg btn-primary " type="submit" id="submitButton">Submit</button>
				</div>
				<input type="hidden" name="submitted" value="true">
			</form>
		</div>

	</div>
</body>
</html>