<?php
require_once("../include/mysql_connect.php");
if(isset($_POST['submitted'])){
  $keywords=$_POST['keywords'];
  $key_arr=explode(' ', $keywords);
  $query="SELECT * from question where ";
  for($i=0;$i<count($key_arr)-1;$i++){
    $key=$key_arr[$i];
    $query=$query . "title like '%$key%' and ";
  }
  $key=$key_arr[count($key_arr)-1];
  $query=$query . "title like '%$key%'";
  //print "$query";

  $result=mysqli_query($db,$query);
  $num_rows=mysqli_num_rows($result);
  
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
  <link rel="stylesheet" href="../askQ/result.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../iCheck/skins/square/blue.css">
  

  
</head>

<body>
 <?php require_once('../include/navbar.inc.php') ?>

    <div class="container mainPane">
      
      <div class="row">
        <div class="col-md-12">
          <form role="form" id="formPane" action='result.php' onsubmit="return check()">
            <div class="form-group">
              <div class="row">
                <div class="col-md-9"><input type="text" class="form-control" name="keywords" id="keywords"></div>
                <div class="col-md-3">
                  <button class="btn btn-primary btn-block myInput" type="submit" ><span class="glyphicon glyphicon-search"></span> Search</button>
                  <label style="display:none" id="tip">请输入搜索内容</label>
                </div>
              </div>          
            </div>

            <div class="row">
              <div class="col-md-1 radioDiv">
                <input type="radio" name="iCheck" id="chooseQuestion" checked>
              </div> 
              <div class="col-md-2">
                <label for="chooseQuestion">Question</label>
              </div>
              <div class="col-md-1 radioDiv">
                <input type="radio" name="iCheck" id="chooseUser">
              </div>
              <div class="col-md-2"><label for="chooseUser">User</label></div>
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
            $questionID=$row['id'];
            $title=$row['title'];
            $answerCount=$row['answerCount'];
            $userID=$row['userID'];
            $userName=getUserNameByID($db,$userID); 
            printQuestion($questionID,$title,$answerCount,$userName);
            $row=mysqli_fetch_assoc($result);           
          }
        }
        ?>
        <div class="row">
        <div class="col-md-12">
          <div class="questionItem">
          <table>
            <tr>
              <td class="answerCountTD">
                <div class="answerCount">5</div>
                <div><small>Answers</small></div>
              </td>
              <td class="questionTD">
                <a href="../askQ/question.html"><h4>java 如何拖动窗体？</h4></a>
                <span class="label label-info labelTag"><a href="" class="tagLink">C++</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
              </td>
              <td class="userTD">
                huangtao
              </td>
            </tr>
          </table> 
          </div>
          
        </div>
        </div>

        <div class="row">
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
                <div class="description"></div>
                <span class="label label-info labelTag"><a href="#" class="tagLink">C++</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">Java</a></span>
                <span class="label label-info labelTag"><a href="#" class="tagLink">PHP</a></span>
              </td>
              <td class="userTD">
                huangtao
              </td>
            </tr>
          </table> 
          </div>
          
        </div>
        </div>

        <div class="row">
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
          </div>
          
        </div>
        </div><!--row ends-->

        <div class="row">
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
          </div>
          
        </div>
        </div><!--row ends-->

        <div class="row">
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
          </div>
          
        </div>
        </div><!--row ends-->

        <div class="row">
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
          </div>
          
        </div>
        </div><!--row ends-->
      </div><!--resultList ends-->
      

      <div class="row">
        <div class="col-md-12 centerDiv">
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