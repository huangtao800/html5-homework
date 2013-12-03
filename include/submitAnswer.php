<?
session_start();
if(!isset($_SESSION['id'])){
	header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}
if(isset($_POST['submitted'])){
	$answerContent=$_POST['answerContent'];
	$userID=$_SESSION['id'];
	$questionID=$_POST['questionID'];
}
?>