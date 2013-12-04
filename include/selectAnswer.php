<?php
require_once("mysql_connect.php");
$questionID=$_POST['questionID'];
$answerID=$_POST['answerID'];
$answerUserID=$_POST['answerUserID'];
$coin=$_POST['coin'];
$answerQuery="UPDATE question set selectedAnswerID='$answerID' where id='$questionID'";
mysqli_query($db,$answerQuery);
$coinQuery="UPDATE user set coin =coin+$coin where id='$answerUserID'";
mysqli_query($db,$coinQuery);
header('Location: http://'. $_SERVER['HTTP_HOST'] ."/askQ/question.php?questionID=$questionID");
?>