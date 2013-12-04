<?php

require_once("mysql_connect.php");
$support=$_GET['support'];
$questionID=$_GET['questionID'];
$answerID=$_GET['answerID'];
$questionUserID=$_GET['questionUserID'];
$answerUserID=$_GET['answerUserID'];
$answerQuery="UPDATE answer set supportCount=supportCount+$support where id='$answerID'";
mysqli_query($db,$answerQuery);

$coinQuery="";
if($support==1){
	$coinQuery="UPDATE user set coin=coin+10 where id='$answerUserID'";
	# messege Count code should be here
}else{
	$currentCoin=getCurrentCoin($db,$questionUserID);
	$newCoin=$currentCoin-2;
	if($newCoin<0){
		$newCoin=0;
	}
	$coinQuery="UPDATE user set coin='$newCoin' where id='$answerUserID'";

}
mysqli_query($db,$coinQuery);
$currentCoin=getCurrentCoin($db,$questionUserID);
echo getSupportCount($db,$answerID);

function getCurrentCoin($db,$userID){
	$currentCoin=0;
	$currentCoinQuery="SELECT * from user where id='$userID'";
	$currentResult=mysqli_query($db,$currentCoinQuery);
	if($currentResult){
		$currentCoinRow=mysqli_fetch_assoc($currentResult);
		$currentCoin=$currentCoinRow['coin'];
	}
	return $currentCoin;
}

function getSupportCount($db,$answerID){
	$supportCount=0;
	$supportQuery="SELECT * FROM answer where id='$answerID'";
	$result=mysqli_query($db,$supportQuery);
	if($result){
		$row=mysqli_fetch_assoc($result);
		$supportCount=$row['supportCount'];
	}
	return $supportCount;
}

?>