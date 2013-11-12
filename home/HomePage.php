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
            <li class="active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <span class="badge">42</span></a>
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
                  <td>huangtao7725@live.com</td>
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
          <li class="active"><a href="../home/HomePage.html">Questions</a></li>
          <li><a href="../home/HomePage_Answer.html">Answers</a></li>
        </ul> 
    
      </div><!--navbar ends--> 

      <div class="myAnswer">
        <h4><b><span id="answerCount">5</span></b> <small>Questions</small></h4>

        <?php
        $query="SELECT * from question where userID='$id'";
        $result=mysqli_query($db,$query);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0){

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