<?php
session_start();
require_once('../include/mysql_connect.php');
require_once('../include/useful.inc.php');
if(!isset($_SESSION['id'])){
  header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
$isCoinOut=false;
if(isset($_POST['submitted'])){
  $userID=$_SESSION['id'];
  $title=$_POST['title'];
  $description=$_POST['description'];
  $tagList=$_POST['tags'];
  $tagList=trim($tagList);
  $tag_arr=explode(' ', $tagList);
  $coin=$_POST['coin'];
  $time=date('Y-m-d H:i:s');

  $user=getUserByID($db,$userID);
  $ownCoin=$user['coin'];
  $isCoinOut=($coin>$ownCoin);

  if(!$isCoinOut){
      $insertString="";
      if(!empty($_FILES['upload']['name'])){
        $allowed = array('image/pjpeg','image/jpeg','image/JPG','image/X_PNG','image/PNG','image/png','image/x-png');
        if(in_array($_FILES['upload']['type'], $allowed)){
          $fileName=$userID."-".$_FILES['upload']['name'];
          $path="../upload/{$fileName}";
          if(move_uploaded_file($_FILES['upload']['tmp_name'], iconv("UTF-8", "gb2312", $path))){
            #$fileName=$_FILES['upload']['name'];
            $insertString="INSERT INTO question(title,description,userID,coin,time,fileName) VALUES ('$title','$description','$userID','$coin','$time','$fileName')";
          }
        }else{
          echo "Please upload a JPEG or PNG image";
        }
      }else{
        $insertString="INSERT INTO question(title,description,userID,coin,time) VALUES ('$title','$description','$userID','$coin','$time')";
      }

      
      mysqli_query($db,$insertString);
      $questionID=mysqli_insert_id($db);
      //print $questionID;
      if($questionID!=0){
        $insertTag="INSERT INTO questiontag(questionID,tag) VALUES ('$questionID'";
        for ($i=0;$i<count($tag_arr)-1;$i++) {
          $currentTag=$tag_arr[$i];
          $insertTag=$insertTag.",'$currentTag'";
        }
        $currentTag=$tag_arr[$i];
        $insertTag=$insertTag.",'$currentTag')";
        
        mysqli_query($db,$insertTag);
        addQuestionCount($db,$userID);
        decreaseCoin($db,$userID,$coin);
        header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/askQ/question.php?questionID='."$questionID");
      }
    }   
  }

function addQuestionCount($db,$userID){
  $query="UPDATE user set questionCount=questionCount+1 where id='$userID'";
  $result=mysqli_query($db,$query);
}

function decreaseCoin($db,$userID,$coin){
  $query="UPDATE user set coin=coin-$coin where id='$userID'";
  $result=mysqli_query($db,$query);
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
  <link rel="stylesheet" href="search.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../askQ/ask.css">

  
</head>

<body>
    <!-- Static navbar -->
    <?php require_once('../include/navbar.inc.php') ?>


    <div class="container mainPane">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-7">
            <input type="text" id="title" class="form-control" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-7">
            <textarea type="text" class="form-control" id="description" rows=10 name="description" required></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="tag" class="col-sm-2 control-label">Tags</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="tag" name="tags" required>
          </div>
        </div>

        <div class="form-group">
          <label for="file" class="col-sm-2 control-label">上传图片</label>
          <div class="col-sm-7">
            <input type="hidden" name="MAX_FILE_SIZE" vlaue="52428800">
            <input type="file" name="upload">
            <input type="hidden" name="submitted" value="true">
            
          </div>
        </div>

        <div class="form-group">
          <label for="coinChooser" class="col-sm-2 control-label">悬赏分值</label>
          <div class="col-sm-7">
            <select id="coinChooser" class="form-control" name="coin">
                    <option value="0" selected="selected">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
            </select>
            <?php if($isCoinOut) print "<P class='warn'>抱歉，您的分值不够！</p>"?>
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-7">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
          </div>
        </div>
      </form> 
      
    </div><!--container end-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>