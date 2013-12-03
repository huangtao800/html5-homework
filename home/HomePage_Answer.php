<?php
session_start();
require_once('../include/mysql_connect.php'); 
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
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
  <link rel="stylesheet" type="text/css" href="../askQ/result.css">
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
          <?php if(!isset($_GET['id'])) print"<li><a href=''>Edit</a></li>"?>
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
          <li><a href="../home/HomePage.php">Questions</a></li>
          <li class="active"><a href="../home/HomePage_Answer.html">Answers</a></li>
        </ul> 
    
      </div><!--navbar ends--> 

      <div class="myAnswer">
        <h4><b><span id="answerCount"><?php print "$answerCount"?></span></b> <small>Answers</small></h4>

        <?php
        require_once('../include/useful.inc.php');
        $query="SELECT questionID from answer where userID='$id'";
        $result=mysqli_query($db,$query);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0){
          $row=mysqli_fetch_assoc($result);
          $questionList=array();
          $index=0;
          for($i=0;$i<$num_rows;$i++){
            $questionID=$row['questionID'];

            $query="SELECT * from question where id='$questionID'";
            $result2=mysqli_query($db,$query);
            $num_rows2=mysqli_num_rows($result2);

            if($num_rows2>0){
              $row2=mysqli_fetch_assoc($result2);
              for($j=0;$j<$num_rows2;$j++){
                $title=$row2['title'];
                $answerCount=$row2['answerCount'];
                $userID=$row2['userID'];
                $userName=getUserNameByID($db,$userID);
                $tagList=getTagListByQuestionID($db,$questionID);

                if(!in_array($questionID, $questionList)){
                  printQuestion($questionID,$title,$answerCount,$userName,$tagList);
                  $questionList[$index]=$questionID;
                  $index++;
                }
                
                $row2=mysqli_fetch_assoc($result2);
              }              
            }

            $row=mysqli_fetch_assoc($result);
          }          
        }




        ?>
        

              
      </div>

    </div>
    
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>