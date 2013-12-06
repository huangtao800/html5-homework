<?php
session_start();
require_once('../include/mysql_connect.php');
if(isset($_GET['id'])){
  $id=$_GET['id'];
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
}else if(isset($_SESSION['id'])){
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
          <li class="active">
            <?php 
            if(isset($_GET['id'])){
              print ("<a href='../home/HomePage.php?id=$id'>");
            }else{
              print ("<a href='../home/HomePage.php'>");
            }
          ?>
          Questions</a></li>
          <li>
            <?php
            if(isset($_GET['id'])){
              print ("<a href='../home/HomePage_Answer.php?id=$id'>");
            }else{
              print ("<a href='../home/HomePage_Answer.php'>");
            }            
            ?>
            Answers</a></li>
        </ul> 
    
      </div><!--navbar ends--> 

      <div class="myAnswer">
        <h4><b><span id="questionCount"><?php print $questionCount?></span></b> <small>Questions</small></h4>

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
          $tagList=getTagListByQuestionID($db,$questionID);
          printHomeQuestion($questionID,$title,$answerCount,$userName,$tagList);
          $row=mysqli_fetch_assoc($result);
        }

function printHomeQuestion($questionID,$title,$answerCount,$userName,$tagList){
  print ("<div class='row rowTD'>
          <div class='col-md-12'>
            <div class='questionItem'>
            <table>
              <tr>
                <td class='answerCountTD'>
                  <div class='answerCount'>$answerCount</div>
                  <div><small>Answers</small></div>
                </td>
                <td class='questionTD'>
                  <a href='../askQ/myUnanswered.php?questionID=$questionID'><h4>$title</h4></a>");
for($i=0;$i<count($tagList);$i++){
  $currentTag=$tagList[$i];
  print ("<span class='label label-info labelTag'><a href='../askQ/result.php?tag=$currentTag' class='tagLink'>$currentTag</a></span>");
}

print("</td>
                <td class='userTD'>
                  $userName
                </td>
              </tr>
            </table> 
            </div><!--questionItem ends-->
          </div>
        </div>");
                  
}
        ?>

        

      </div><!--myAnswer ends-->

    </div>
    
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>