<?php
session_start();
require_once('../include/mysql_connect.php');
if(!isset($_SESSION['id'])){
  header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
if(isset($_POST['submitted'])){
  $userID=$_SESSION['id'];
  $title=$_POST['title'];
  $description=$_POST['description'];
  $tagList=$_POST['tags'];
  $tagList=trim($tagList);
  $tag_arr=explode(' ', $tagList);
  $coin=$_POST['coin'];
  $time=date('Y-m-d H:i:s');

  
  $insertString="";
  if(!empty($_FILES['upload']['name'])){
    $allowed = array('image/pjpeg','image/jpeg','image/JPG','image/X_PNG','image/PNG','image/png','image/x-png');
    if(in_array($_FILES['upload']['type'], $allowed)){
      if(move_uploaded_file($_FILES['upload']['tmp_name'], "../upload/{$_FILES['upload']['name']}")){
        $fileName=$_FILES['upload']['name'];
        $insertString="INSERT INTO question(title,description,userID,coin,time,fileName) VALUES ('$title','$description','$userID','$coin','$time','$fileName')";
      }
    }else{
      echo "Please upload a JPEG or PNG image";
    }
  }else{
    $insertString="INSERT INTO question(title,description,userID,coin,time) VALUES ('$title','$description','$userID','$coin','$time')";
  }

  print $fileName;
  mysqli_query($db,$insertString);
  $questionID=mysqli_insert_id($db);
  //print $questionID;
  if($questionID!=0){
    header ('Location: http://'. $_SERVER['HTTP_HOST'] .'/askQ/question.php?questionID='."$questionID");
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
	<link href="../dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../home/home.css">
  <link rel="stylesheet" href="search.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../askQ/ask.css">

  
</head>

<body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.php"><img src="../home/logoIcon.png" class="logoIcon" ></a>
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="navbar-collapse collapse myNavBar">
          <ul class="nav navbar-nav">
            <li><a href="../askQ/tagList.html">Tags</a></li>
          </ul>

          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control navbarForm" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form>

          <div class="navbar-form navbar-right">
            <div class="form-group">
              <button class="btn btn-md btn-default" id="askButton">Ask Question</button>
            </div>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <span class="badge">42</span></a></a>
              <ul class="dropdown-menu">
                <li><a href="../home/HomePage.html">Home</a></li>
                <li><a href="../home/HomePage.html">Sign out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div><!--navibar ends-->



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