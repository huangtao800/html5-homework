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
  <link rel="stylesheet" href="../askQ/tagList.css">
  <script src="../js/common.js"></script>
</head>

<body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.phps"><img src="../home/logoIcon.png" class="logoIcon" ></a>
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="navbar-collapse collapse myNavBar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../askQ/tagList.html">Tags</a></li>
          </ul>

          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control navbarForm" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form>

          <div class="navbar-form navbar-right">
            <div class="form-group">
              <button class="btn btn-md btn-default" onclick="askQuestion()" id="askButton">Ask Question</button>
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
      <div class="row tagTitle">
        <div class="col-md-12">
          <h2 class="myFont">Tags</h2>
          <small>A tag is a keyword or label that categorizes your question with other, similar questions. Using the right tags makes it easier for others to find and answer your question.</small>
        </div>
      </div>

      <div class="row tagList">
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
            <small><span>×3456</span></small>
            <p><small>C++ is a widely-used, statically-typed, free-form, compiled, multi-paradigm, multi-level, imperative, general-purpose, object-oriented programming language based on C.</small></p> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="#" class="tagLink">HTML</a></span>
            <p><small>HTML (HyperText Markup Language) is the principal markup language used for structuring web pages and formatting content. The most recent iteration of HTML is HTML5.</small></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
            <p><small>Java (not to be confused with JavaScript) is a class-based, object-oriented, strongly typed, reflective language and runtime environment (JRE). Java programs are compiled to bytecode and run in a virtual machine (JVM) enabling a "write once, run anywhere" (WORA) methodology.</small></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Javasript</a></span>
          </div>
        </div>
      </div><!--end row-->

      <div class="row tagList">
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">C</a></span>
            <p><small>A programming language</small></p> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Mysql</a></span>
          </div>
        </div>
      </div><!--end row-->

      <div class="row tagList">
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Python</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Ruby</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">Rail</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="#" class="tagLink">VB</a></span>
          </div>
        </div>
      </div><!--end row-->
    </div><!--container end-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

</body>
</html>