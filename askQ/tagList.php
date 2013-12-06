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
    <?php
    require_once("../include/navbar.inc.php");
    ?>



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
            <span class="label label-info labelTag"><a href="result.php?tag=C++" class="tagLink">C++</a></span>
            <small><span>×3456</span></small>
            <p><small>C++ is a widely-used, statically-typed, free-form, compiled, multi-paradigm, multi-level, imperative, general-purpose, object-oriented programming language based on C.</small></p> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="result.php?tag=HTML" class="tagLink">HTML</a></span>
            <p><small>HTML (HyperText Markup Language) is the principal markup language used for structuring web pages and formatting content. The most recent iteration of HTML is HTML5.</small></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="result.php?tag=Java" class="tagLink">Java</a></span>
            <p><small>Java (not to be confused with JavaScript) is a class-based, object-oriented, strongly typed, reflective language and runtime environment (JRE). Java programs are compiled to bytecode and run in a virtual machine (JVM) enabling a "write once, run anywhere" (WORA) methodology.</small></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD tagDescription">
            <span class="label label-info labelTag"><a href="result.php?tag=Javascript" class="tagLink">Javasript</a></span>
          </div>
        </div>
      </div><!--end row-->

      <div class="row tagList">
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=C" class="tagLink">C</a></span>
            <p><small>A programming language</small></p> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=PHP" class="tagLink">PHP</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=Mysql" class="tagLink">Mysql</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=C#" class="tagLink">C#</a></span>
          </div>
        </div>
      </div><!--end row-->

      <div class="row tagList">
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=Python" class="tagLink">Python</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=Ruby" class="tagLink">Ruby</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=Rail" class="tagLink">Rail</a></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tagTD">
            <span class="label label-info labelTag"><a href="result.php?tag=VB" class="tagLink">VB</a></span>
          </div>
        </div>
      </div><!--end row-->
    </div><!--container end-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

</body>
</html>