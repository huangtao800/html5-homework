<?php 
session_start();
$isPasswordWrong=FALSE;
if(isset($_POST['submitted'])){
	$db=mysqli_connect("localhost","root","Paul_1993","askq");
	if(mysqli_connect_errno()){
	print("Connect Database Failed");
	exit();
	}
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="SELECT * from user where email = '$email' and password='$password'";
	$result=mysqli_query($db,$query);
	$num_rows=mysqli_num_rows($result);
	if($num_rows>0){
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
		$id=$row['id'];
    
    $_SESSION['name']=$name;
    $_SESSION['id']=$id;
		//setcookie('name',$name,time()+86400,'/');
		//setcookie('id',$id,time()+86400,'/');

		header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
    exit();

	}else{
		$isPasswordWrong=TRUE;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <link href="../css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">

  </head>

  <body>
    <div class="container logPane">
      <div class="row">
        <div class="col-sm-7">
          <div id="carousel-example-generic" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="../img/1.jpg" alt="..." class="loop">
                <div class="carousel-caption">
                  <h2 class="myFont">Easy</h2>
                </div>
              </div>

              <div class="item">
                <img src="../img/2.jpg" alt="..." class="loop">
                <div class="carousel-caption">
                  <h2 class="myFont">Fast</h2>
                </div>
              </div>

              <div class="item">
                <img src="../img/3.jpg" alt="..." class="loop">
                <div class="carousel-caption">
                  <h2 class="myFont">Fun</h2>
                </div>
              </div>
    
            </div>

        </div>
      </div>


        <div class="col-sm-4">
            <form class="form-signin" action="login.php" method="post">
              <img src="logo.png" id="logoImg" />
              <h2 class="form-signin-heading myFont">Please sign in</h2>
              <div class="component">
                <input type="text" class="form-control" name="email" placeholder="Email address" required autofocus>
              </div>
              <div class="component">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
        
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
              </label>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              <input type="hidden" name="submitted" value="true">
              <?php 
              if($isPasswordWrong){
                print ("<lable class='passwordWrongLabel'>密码错误！</lable>");
              }
              ?>
            </form>
            <p id="registerLink">
              <a href="../register/register.php">还没有账号？现在注册！</a>
            </p>
        </div>

      </div>

    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../login/login.js"></script>
  </body>
</html>
