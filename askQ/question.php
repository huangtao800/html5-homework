<?php
require_once('../include/mysql_connect.php');
require_once('../include/useful.inc.php');
$questionID=$_GET['questionID'];
$query="SELECT * from question where id='$questionID'";
$result=mysqli_query($db,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    $row=mysqli_fetch_assoc($result);
    $title=$row['title'];
    $description=$row['description'];
    $userID=$row['userID'];
    $askUserName=getUserNameByID($db,$userID);
    $time=date('Y-m-d H:i:s');
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
    <link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../home/home.css">
  	<link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../css/common.css">
  	<link rel="stylesheet" href="../askQ/ask.css">
    <link rel="stylesheet" href="../askQ/question.css">
    <link href="../Font-Awesome-3.0.2/css/font-awesome.css" rel="stylesheet">
    
    
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
		<div class="title">
        	<h2 class="myFont"><?php print $title?></h2>
        </div>
        
        <div class="row description">
        	<p><?php print $description ?></p>
        </div>

        <div class="row tags">
        	<span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
            <span class="label label-info labelTag"><a href="#" class="tagLink">HTML</a></span>
        </div>

        <div class="row auxiDiv">
            <div class="col-md-12">
                <img src="test.jpg" class="uploadImg">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="peopleDiv">
                    <img src="../home/userLogo.png" >
                    <?php print $askUserName?>
                    <p class="time"><?php print "$time"?></p>
                </div>

            </div>
        	
            
        </div>
        
        <div class="answerItemDiv">
            <div class="row">
                <div class="col-md-1">
                    <div class="row centerDiv">
                        <div class="col-md-12">
                            <button type="button" class="noBorderBtn btn btn-default tipsLeft" data-toggle="tooltip" data-placement="top" title="" data-original-title="Useful answer!" ><span class="glyphicon glyphicon-chevron-up"></span></button>
                        </div>
                        
                    </div>

                    <div class="row centerDiv">
                        <div class="col-md-12">
                            <span calss="score cneterTD">5</span>
                        </div>
                    </div>

                    <div class="row centerDiv">
                        
                            <button type="button" class="btn btn-default tipsLeft noBorderBtn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="I don't think so..." ><span class="glyphicon glyphicon-chevron-down"></span></button>
                        
                    </div>
                </div>


                <div class="col-md-11">
                    <div class="answerContent">
                        <p>asdfjkajsdfj asdfasdf e</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <div class="peopleDiv">
                        <img src="../home/userLogo.png" >
                        huatao
                    </div>
                    
                </div>
            </div>

        </div><!--end answerDiv-->
        
        <div class="answerItemDiv">
            <div class="row">
                <div class="col-md-1">
                    <div class="row centerDiv">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default tipsLeft noBorderBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Useful answer!" ><span class="glyphicon glyphicon-chevron-up"></span></button>
                        </div>
                        
                    </div>

                    <div class="row centerDiv">
                        <div class="col-md-12">
                            <span calss="score cneterTD">5</span>
                        </div>
                    </div>

                    <div class="row centerDiv">
                        
                            <button type="button" class="btn btn-default tipsLeft noBorderBtn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="I don't think so." ><span class="glyphicon glyphicon-chevron-down"></span></button>
                        
                    </div>
                </div>


                <div class="col-md-11">
                    <div class="answerContent">
                        <p>asdfjkajsdfj asdfasdf e</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <div class="peopleDiv">
                        <img src="../home/userLogo.png" >
                        huatao
                    </div>
                    
                </div>
            </div>

        </div><!--end answerDiv-->

        <div>
            <h3 class="myFont">Your Answer</h3>
            <div class="yourAnswerDiv">
                <form>
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                        </div>
                    </div>
                    <div id="editor"></div>                    
                    <button type="submit" class="btn btn-lg btn-primary">Submit your answer</button>
                </form>
            </div>
        </div>


        
  
    </div><!--end container-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../js/jquery.hotkeys.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/inputEditor.js"></script>
    <script src="../askQ/question.js"></script>
	
</body>
</html>