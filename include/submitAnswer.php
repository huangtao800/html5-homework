<?
session_start();
require_once("mysql_connect.php");
if(!isset($_SESSION['id'])){

	header('Location: http://'. $_SERVER['HTTP_HOST'] .'/login/login.php');
}else if(isset($_POST['submitted'])){
	$answerContent=$_POST['answerContent'];
	$userID=$_SESSION['id'];
	$questionID=$_POST['questionID'];
	$time=date('Y-m-d H:i:s');
	$query="INSERT INTO answer(questionID,content,userID,time) VALUES ('$questionID','$answerContent','$userID','$time')";
	mysqli_query($db,$query);
	addAnswerCount($db,$userID);
	addAnswerCountInQuestion($db,$questionID);


	if(!empty($_FILES['upload']['name'])){
		$allowed = array('image/pjpeg','image/jpeg','image/JPG','image/X_PNG','image/PNG','image/png','image/x-png');
		if(in_array($_FILES['upload']['type'], $allowed)){
			$fileName=$userID."-".$questionID."-".$_FILES['upload']['name'];
			 $path="../answer/{$fileName}";
			 if(move_uploaded_file($_FILES['upload']['tmp_name'], iconv("UTF-8", "gb2312", $path))){
			 	$query="INSERT INTO answer(questionID,content,userID,time,fileName) VALUES ('$questionID','$answerContent','$userID','$time','$fileName')";
			 }
		}else{
			echo "Please upload a JPEG or PNG image";
		}
	}
	header('Location: http://'. $_SERVER['HTTP_HOST'] ."/askQ/question.php?questionID=$questionID");
}

function addAnswerCount($db,$userID){
  $query="UPDATE user set answerCount=answerCount+1 where id='$userID'";
  $result=mysqli_query($db,$query);

}

function addAnswerCountInQuestion($db,$questionID){
	$query="UPDATE question set answerCount=answerCount+1 where id='$questionID'";
	mysqli_query($db,$query);
}
?>