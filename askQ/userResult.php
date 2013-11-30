<?php
require_once('../include/mysql_connect.php');
if(!isset($_GET['keywords'])){
  header('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
}
$keywords=$_GET['keywords'];
$keywords=trim($keywords);
$key_arr=explode(' ', $keywords);
$query="SELECT * from user where ";
for($i=0;$i<count($key_arr)-1;$i++){
  $key=$key_arr[$i];
  $query=$query . "name like '%$key%' or ";
}
$key=$key_arr[count($key_arr)-1];
$query=$query . "name like '%$key%'";

$result=mysqli_query($db,$query);
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
  <link rel="stylesheet" href="../askQ/result.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../iCheck/skins/square/blue.css">
  <link rel="stylesheet" href="../askQ/userResult.css">

 
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
              <button class="btn btn-sm btn-default" id="askButton">Ask Question</button>
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
      
      <div class="row">
        <div class="col-sm-12">
          <form role="form" id="formPane">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-9"><input type="text" class="form-control"></div>
                <div class="col-sm-3"><button class="btn btn-primary btn-block myInput" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button></div>
              </div>          
            </div>

            <div class="row">
              <div class="col-sm-1 radioDiv">
                <input type="radio" name="iCheck" id="chooseQuestion">
              </div> 
              <div class="col-sm-2">
                <label for="chooseQuestion">Question</label>
              </div>
              <div class="col-sm-1 radioDiv">
                <input type="radio" name="iCheck" id="chooseUser" checked>
              </div>
              <div class="col-sm-2"><label for="chooseUser">User</label></div>
            </div>            
          </form>

        </div>
      </div>


          <div class="resultList">
            <?php
            require_once('../include/useful.inc.php');
            if($result){
              $num_rows=mysqli_num_rows($result);

              $row=mysqli_fetch_assoc($result);
              for($row_num=0;$row_num<$num_rows;$row_num++){
                
                $name=$row['name'];
                $answerCount=$row['answerCount'];
                $questionCount=$row['questionCount'];
                $userID=$row['id'];
                $userInfo=$row['info'];
                
                printUser($userID,$name,$answerCount,$questionCount,$userInfo);
                $row=mysqli_fetch_assoc($result);           
              }
            }
            ?>
 

            <div class="row userRow">
              <div class="col-md-12">
                <div class="userItem">
                  <div class="row">
                    <div class="col-sm-1">
                      <div class="userImgDiv">
                        <a href="../home/HomePage.html"><img src="../home/user.png" class="userImg"></a>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="userInfo">
                            <div><a href="../home/HomePage.html" class="userNameLink">huangtao</a></div>
                            <div><p>我是一个苦逼码农</p></div>
                          </div>
                        </div>
                      </div>

                      <div class=row>
                        <div class="col-sm-2 QA">
                          <span class="answerCount">5</span><small> Answers</small>
                        </div>
                        <div>
                          <span class="questionCount">3</span><small> Questions</small>
                        </div>
                      </div>

                    </div>
                  </div>
                </div><!--userItem ends-->            
              </div>
            </div><!--userRow ends-->

            <div class="row userRow">
              <div class="col-md-12">
                <div class="userItem">
                  <div class="row">
                    <div class="col-sm-1">
                      <div class="userImgDiv">
                        <a href="../home/HomePage.html"><img src="../home/user.png" class="userImg"></a>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="userInfo">
                            <div><a href="../home/HomePage.html" class="userNameLink">huangtao</a></div>
                            <div><p>我是一个苦逼码农</p></div>
                          </div>
                        </div>
                      </div>

                      <div class=row>
                        <div class="col-sm-2 QA">
                          <span class="answerCount">5</span><small> Answers</small>
                        </div>
                        <div>
                          <span class="questionCount">3</span><small> Questions</small>
                        </div>
                      </div>

                    </div>
                  </div>
                </div><!--userItem ends-->            
              </div>
            </div><!--userRow ends-->                
          </div> <!--resultList ends-->         


      

      <div class="row">
        <div class="col-sm-12 centerDiv">
          <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">6</a></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><a href="#">10</a></li>
          <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
      
    </div><!--container ends-->


    <script src="../jquery-1.10.2.min.js"></script> 
    <script src="../iCheck/jquery.icheck.js"></script> 
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../askQ/search.js"></script>
    <script src="../js/common.js"></script>
</body>
</html>