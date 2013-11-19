<?
if(!isset($_COOKIE['id'])){
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
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-7">
            <input type="text" id="title" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-7">
            <textarea type="text" class="form-control" id="description" rows=10></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="tag" class="col-sm-2 control-label">Tags</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="tag">
          </div>
        </div>

        <div class="form-group">
          <label for="file" class="col-sm-2 control-label">上传文件</label>
          <div class="col-sm-7">
           <input type="file">
            
          </div>
        </div>

        <div class="form-group">
          <label for="coinChooser" class="col-sm-2 control-label">悬赏分值</label>
          <div class="col-sm-7">
            <select id="coinChooser" class="form-control">
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