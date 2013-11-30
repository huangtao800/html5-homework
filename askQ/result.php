<?php
require_once("../include/mysql_connect.php");
if(!isset($_GET['keywords'])){
  header('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
}
$keywords=$_GET['keywords'];
$keywords=trim($keywords);
$key_arr=explode(' ', $keywords);
$query="SELECT * from question where ";
for($i=0;$i<count($key_arr)-1;$i++){
  $key=$key_arr[$i];
  $query=$query . "title like '%$key%' or ";
}
$key=$key_arr[count($key_arr)-1];
$query=$query . "title like '%$key%'";

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
  

  
</head>

<body>
 <?php require_once('../include/navbar.inc.php') ?>

    <div class="container mainPane">
      
      <div class="row">
        <div class="col-md-12">
          <form role="form" id="formPane" action='../index.php'>
            <div class="form-group">
              <div class="row">
                <div class="col-md-9"><input type="text" class="form-control" name="keywords" required value="<?php echo $keywords?>"></div>
                <div class="col-md-3">
                  <button class="btn btn-primary btn-block myInput" type="submit" ><span class="glyphicon glyphicon-search"></span> Search</button>
                  
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
                <input type="hidden" name="submitted" value="true">
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