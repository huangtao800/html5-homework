<?php
function getUserNameByID($userID){
	$query="SELECT name from user where userID='$userID'";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_assoc($result);
	return $row['name'];
}

function printQuestion($title,$answerCount,$userName){}
?>