<?
session_start();
require_once("mysql_connect.php");
if(!isset($_SESSION['id'])){
	header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
if(isset($_POST['submitted'])){
	$answerContent=$_POST['answerContent'];
	$userID=$_SESSION['id'];
	$questionID=$_POST['questionID'];
	$time=date('Y-m-d H:i:s');
	$query="INSERT INTO answer(questionID,content,userID,time) VALUES ('$questionID','$answerContent','$userID','$time')";
	mysqli_query($db,$query);
	addAnswerCount($db,$userID);
	header('Location: http://'. $_SERVER['HTTP_HOST'] ."/askQ/question.php?questionID=$questionID");
}

function addAnswerCount($db,$userID){
  $query="UPDATE user set answerCount=answerCount+1 where id='$userID'";
  $result=mysqli_query($db,$query);

}
?>