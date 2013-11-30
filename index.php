<?php
if(isset($_GET['submitted'])){
  if($_GET['iCheck']==0){
    $keywords=$_GET['keywords']; 
    echo "<script>location.href='/askQ/result.php?keywords=$keywords'</script>";
  }else{
    $keywords=$_GET['keywords']; 
    echo "<script>location.href='/askQ/userResult.php?keywords=$keywords'</script>";
  }
}
require_once('include/mysql_connect.php');
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
  $query="select * from user where id = '$id'";
  $result=mysqli_query($db,$query);
  $num_rows=mysqli_num_rows($result);
  if($num_rows>0){
    $row=mysqli_fetch_assoc($result);
    $messageCount=$row['messageCount'];
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AsQ</title>
<link href="dist/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="home/home.css">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="iCheck/skins/square/blue.css">
<link rel="stylesheet" href="askQ/search.css">



</head>

<body>
<?php require_once('include/navbar.inc.php');
?>

<div class="container mainPane">
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-3"> <img src="/login/logo.png"> </div>
    <div class="col-md-4"></div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li><a href="askQ/tagList.html">Tags</a></li>
        <li><a href="">Unanswered</a></li>
        <li><a href="askQ/ask.php">I want to Ask</a></li>
      </ul>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <form id="formPane" method="get" action="index.php">

        <div class="form-group">
          <div class="row">
            <div class="col-md-9">
              <input type="text" class="form-control" name="keywords" required>
              <input type="hidden" name="submitted" value="true">
            </div>
            <div class="col-md-3">
              <button class="btn btn-lg btn-primary btn-block myInput" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
              
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-1 radioDiv">
            <input type="radio" name="iCheck" id="chooseQuestion" value='0' checked>
          </div> 
          <div class="col-md-2">
            <label for="chooseQuestion">Question</label>
          </div>
          <div class="col-md-1 radioDiv">
            <input type="radio" name="iCheck" id="chooseUser" value='1'>
          </div>
          <div class="col-md-2"><label for="chooseUser">User</label></div>
        </div>


      </form>
    </div>
  </div>

  <div class="hotQuestion">
    <h3 class="myFont">Top Questions</h3>
      <div class="hotQuestionItem">
          <table>
            <tr>
              <td class="answerCountTD">
                <div class="answerCount">5</div>
                <div><small>Answers</small></div>
              </td>
              <td class="questionTD">
                <a href="askQ/question.html"><h4>java 如何拖动窗体？</h4></a>
                <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                
              </td>
            </tr>
          </table>  
      </div><!--hotQuestionItem ends-->

      <div class="hotQuestionItem">
          <table valign="middle">
            <tr>
              <td class="answerCountTD">
                <div class="answerCount">5</div>
                <div><small>Answers</small></div>
              </td>
              <td class="questionTD">
                <a href="askQ/question.html"><h4>java 如何拖动窗体？</h4></a>
                <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
              </td>
              <td class="userTD">
                huangtao
              </td>
            </tr>
          </table>  
      </div><!--hotQuestionItem ends-->

      <div class="hotQuestionItem">
          <table>
            <tr>
              <td class="answerCountTD">
                <div class="answerCount">5</div>
                <div><small>Answers</small></div>
              </td>
              <td class="questionTD">
                <a href="askQ/question.html"><h4>java 如何拖动窗体？</h4></a>
                <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
              </td>
              <td class="userTD">
                huangtao
              </td>
            </tr>
            </tr>
          </table>  
      </div><!--hotQuestionItem ends-->

      <div class="hotQuestionItem">
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
            </tr>
          </table>  
      </div><!--hotQuestionItem ends-->      
   
</div>
<!--container end--> 

<script src="jquery-1.10.2.min.js"></script> 
<script src="iCheck/jquery.icheck.js"></script>
<script src="askQ/search.js"></script>
<script src="dist/js/bootstrap.min.js"></script> 
<script src="js/common.js"></script>

</body>
</html>