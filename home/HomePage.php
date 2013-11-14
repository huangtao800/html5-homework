<?php
session_start();
require_once('../include/mysql_connect.php'); 
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
  $name=$_SESSION['name'];
  $query="SELECT * from user where id = '$id'";
  $result=mysqli_query($db,$query);
  $num_rows=mysqli_num_rows($result);
  if($num_rows>0){
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $coin=$row['coin'];
    $questionCount=$row['questionCount'];
    $answerCount=$row['answerCount'];
  }

}else{
  header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>AsQ</title>
	<link href="../dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../home/home.css">
  <link rel="stylesheet" href="../askQ/search.css">
  <link rel="stylesheet" href="../askQ/result.css">
  <link rel="stylesheet" href="../css/common.css">

</head>

<body>
    <?php
    require_once('../include/navbar.inc.php');
    ?>

    <div class="container mainPane">
      <div class="navBar">
        <ul class="nav nav-tabs">
          <li class="active"><a href="">Home</a></li>
          <li><a href="">Edit</a></li>
        </ul> 
    
      </div><!--navbar ends-->
        

      <div class="profile">
        <div class="row">
          <div class="col-md-2">
            <div class="centerDiv">
              <img src="user.png">
            </div>
            <div class="centerDiv">
              <p><b><?php print "$name"?></b></p>
              <p id="pointNumber"><?php print "$coin"?><small> coins</small></p>
            </div>
          </div>



          <div class="col-md-9">
              <table>
                <tr>
                  <td class="firstCol">Email Address</td>
                  <td><?php print "$email"?></td>
                </tr>
                <tr>
                  <td class="firstCol">User Name</td>
                  <td><?php print "$name"?></td>
                </tr>
              </table>
          </div>

        </div>
      </div><!--profile ends-->


      <div class="navBar">
        <ul class="nav nav-tabs">
          <li class="active"><a href="../home/HomePage.html">Questions</a></li>
          <li><a href="../home/HomePage_Answer.html">Answers</a></li>
        </ul> 
    
      </div><!--navbar ends--> 

      <div class="myAnswer">
        <h4><b><span id="answerCount"><?php print $questionCount?></span></b> <small>Questions</small></h4>

        <?php
        require_once('../include/useful.inc.php');
        $query="SELECT * from question where userID='$id'";
        $result=mysqli_query($db,$query);
        $num_rows=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        for($row_num=0;$row_num<$num_rows;$row_num++){
          $questionID=$row['id'];
          $title=$row['title'];
          $answerCount=$row['answerCount'];
          $userID=$row['userID'];
          $userName=getUserNameByID($db,$userID);

          printQuestion($questionID,$title,$answerCount,$userName);
          $row=mysqli_fetch_assoc($result);
        }


        ?>

        

      </div><!--myAnswer ends-->

    </div>
    
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>