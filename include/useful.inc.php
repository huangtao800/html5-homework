<?php

function getUserNameByID($db,$userID){
	$query="SELECT name from user where id='$userID'";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_assoc($result);
	return $row['name'];
}

function printQuestion($title,$answerCount,$userName){
	print ("<div class='row rowTD'>
          <div class='col-md-12'>
            <div class='questionItem'>
            <table>
              <tr>
                <td class='answerCountTD'>
                  <div class='answerCount'>$answerCount</div>
                  <div><small>Answers</small></div>
                </td>
                <td class='questionTD'>
                  <a href=''><h4>$title</h4></a>
                  <span class='label label-info labelTag'><a href='#' class='tagLink'>C++</a></span>
                  <span class='label label-info labelTag'><a href='#' class='tagLink'>Java</a></span>
                  <span class='label label-info labelTag'><a href='#' class='tagLink'>PHP</a></span>
                </td>
                <td class='userTD'>
                  $userName
                </td>
              </tr>
            </table> 
            </div><!--questionItem ends-->
          </div>
        </div>");
}
?>