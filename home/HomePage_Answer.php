<?php
require_once('../include/mysql_connect.php'); 
if(isset($_COOKIE['id'])){
  $id=$_COOKIE['id'];
  $name=$_COOKIE['name'];
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
          <li><a href="../home/HomePage.php">Questions</a></li>
          <li class="active"><a href="../home/HomePage_Answer.html">Answers</a></li>
        </ul> 
    
      </div><!--navbar ends--> 

      <div class="myAnswer">
        <h4><b><span id="answerCount"><?php print "$answerCount"?></span></b> <small>Answers</small></h4>

        <?php
        require_once('../include/useful.inc.php');
        $query="SELECT questionID from questionAnswer where answerUserID='$id'";
        $result=mysqli_query($db,$query);
        $num_rows=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        for($row_num=0;$row_num<$num_rows;$row_num++){
          $questionID=$row['questionID'];
          $query="SELECT * from question where id='$questionID'";
          $result2=mysqli_query($db,$query);
          $num_rows2=mysqli_num_rows($result2);
          $row2=mysqli_fetch_assoc($result2);
          for($row_num2=0;$row_num2<$num_rows2;$row_num2++){
            $title=$row2['title'];
            $answerCount=$row2['answerCount'];
            $userName=$row2['userName'];
          }

          printQuestion($title,$answerCount,$userName);
          $row=mysqli_fetch_assoc($result);
        }



        ?>
        <div class="row rowTD">
          <div class="col-md-12">
            <div class="questionItem">
            <table>
              <tr>
                <td class="answerCountTD">
                  <div class="answerCount">5</div>
                  <div><small>Answers</small></div>
                </td>
                <td class="questionTD">
                  <a href=""><h4>java 如何拖动窗体？</h4></a>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
                </td>
                <td class="userTD">
                  huangtao
                </td>
              </tr>
            </table> 
            </div><!--questionItem ends-->
          </div>
        </div>

        <div class="row rowTD">
          <div class="col-md-12">
            <div class="questionItem">
            <table>
              <tr>
                <td class="answerCountTD">
                  <div class="answerCount">5</div>
                  <div><small>Answers</small></div>
                </td>
                <td class="questionTD">
                  <a href=""><h4>java 如何拖动窗体？</h4></a>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                  <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
                </td>
                <td class="userTD">
                  huangtao
                </td>
              </tr>
            </table> 
            </div><!--questionItem ends-->
          </div>
        </div>        
      </div>

    </div>
    
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>