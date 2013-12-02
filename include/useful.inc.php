<?php

function getUserNameByID($db,$userID){
	$query="SELECT name from user where id='$userID'";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_assoc($result);
	return $row['name'];
}

function getUserByID($db,$userID){
  $query="SELECT * from user where id='$userID'";
  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);
  return $row;  
}

function printQuestion($questionID,$title,$answerCount,$userName,$tagList){
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
                  <a href='../askQ/question.php?questionID=$questionID'><h4>$title</h4></a>");
for($i=0;$i<count($tagList);$i++){
  $currentTag=$tagList[$i];
  print ("<span class='label label-info labelTag'><a href='../askQ/result.php?tag=$currentTag' class='tagLink'>$currentTag</a></span>");
}

print("</td>
                <td class='userTD'>
                  $userName
                </td>
              </tr>
            </table> 
            </div><!--questionItem ends-->
          </div>
        </div>");
                  
}

function printUser($userID,$userName,$answerCount,$questionCount,$userInfo){
  print (" <div class='row userRow'>
              <div class='col-md-12'>
                <div class='userItem'>
                  <div class='row'>
                    <div class='col-sm-1'>
                      <div class='userImgDiv'>
                        <a href='../home/HomePage.html'><img src='../home/user.png' class='userImg'></a>
                      </div>
                    </div>
                    <div class='col-sm-10'>
                      <div class='row'>
                        <div class='col-sm-12'>
                          <div class='userInfo'>
                            <div><a href='../home/HomePage.php?id=$userID' class='userNameLink'>$userName</a></div>
                            <div><p>$userInfo</p></div>
                          </div>
                        </div>
                      </div>

                      <div class=row>
                        <div class='col-sm-2 QA'>
                          <span class='answerCount'>$answerCount</span><small> Answers</small>
                        </div>
                        <div>
                          <span class='questionCount'>$questionCount</span><small> Questions</small>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>            
              </div>
            </div>");
}

?>