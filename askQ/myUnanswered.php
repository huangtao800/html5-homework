<?php
require_once('../include/mysql_connect.php');
require_once('../include/useful.inc.php');
if(!isset($_GET['questionID'])){
    header('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
}
$questionID=$_GET['questionID'];
$query="SELECT * from question where id='$questionID'";
$result=mysqli_query($db,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    $row=mysqli_fetch_assoc($result);
    $title=$row['title'];
    $description=$row['description'];
    $userID=$row['userID'];
    $askUserName=getUserNameByID($db,$userID);
    $time=$row['time'];
    $fileName=$row['fileName'];
    $selectedAnswerID=$row['selectedAnswerID'];
    $coin=$row['coin'];
}else{
    header('Location: http://'. $_SERVER['HTTP_HOST'] .'/index.php');
}

$tagQuery="SELECT * FROM questiontag where questionID='$questionID'";
$tagResult=mysqli_query($db,$tagQuery);
$tag_num_rows=mysqli_num_rows($tagResult);
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
  	<link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../css/common.css">
  	<link rel="stylesheet" href="../askQ/ask.css">
    <link rel="stylesheet" href="../askQ/question.css">
    <link rel="stylesheet" href="myUnanswered.css">
    
    <script src="../js/common.js"></script>
    
</head>

<body>
    <form id="selectAnswer"></form>
    <!-- Static navbar -->
    <?php require_once('../include/navbar.inc.php') ?>



    <div class="container mainPane">
		<div class="title">
        	<h2 class="myFont"><?php print $title ?></h2>
        </div>
        
        <div class="row description">
        	<p><?php print $description ?></p>
        </div>
        

        <div class="row tags">
            <?php
            if($tag_num_rows>0){
                $tag_row=mysqli_fetch_assoc($tagResult);
                for($i=0;$i<$tag_num_rows;$i++){
                    $tagName=$tag_row['tag'];
                    print "<span class='label label-info labelTag'><a href='result.php?tag=$tagName' class='tagLink'>$tagName</a></span>";
                }
            }
            ?>
        </div>

        <div class="row auxiDiv">
            <div class="col-md-12">
                <?php
                if($fileName){
                    print ("<img src='../upload/$fileName' class='uploadImg'>");
                }
                ?>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="peopleDiv">
                    <img src="../home/userLogo.png" >
                    <?php print $askUserName?>
                    <p class="time"><?php print "$time"?></p>
                </div>

            </div>
            
            
        </div>

        <?php
        if($selectedAnswerID!=0){
            $answerQuery="SELECT * FROM answer where id='$selectedAnswerID'";
            $answerResult=mysqli_query($db,$answerQuery);
            $answerRow=mysqli_fetch_assoc($answerResult);
            print ("<h4 class='myFont'>Selected Answer</h4>");
            $answerUserID=$answerRow['userID'];
            $userName=getUserNameByID($db,$answerUserID);
            $time=$answerRow['time'];
            $answerContent=$answerRow['content'];
            $supportCount=$answerRow['supportCount'];
            $answerID=$answerRow['id'];

            printAnswer($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$userID);

            if($selectedAnswerID==0){
                print ("<h4 class='myFont'>Answers</h4>");
            }else{
                print ("<h4 class='myFont'>Other Answers</h4>");
            } 

            
            $answerQuery="SELECT * FROM answer where questionID='$questionID'";
            $answerResult=mysqli_query($db,$answerQuery);
            $answer_num_rows=mysqli_num_rows($answerResult);

            $answerRow=mysqli_fetch_assoc($answerResult);
            if($answer_num_rows>0){
                for($i=0;$i<$answer_num_rows;$i++){
                    $answerUserID=$answerRow['userID'];
                    $userName=getUserNameByID($db,$answerUserID);
                    $time=$answerRow['time'];
                    $answerContent=$answerRow['content'];
                    $supportCount=$answerRow['supportCount'];
                    $answerID=$answerRow['id'];

                    if($answerID!=$selectedAnswerID){
                        printAnswer($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$userID);
                    }
                    

                    $answerRow=mysqli_fetch_assoc($answerResult);
                }
            }

        }else{
            $answerQuery="SELECT * FROM answer where questionID='$questionID'";
            $answerResult=mysqli_query($db,$answerQuery);
            $answer_num_rows=mysqli_num_rows($answerResult);

            $answerRow=mysqli_fetch_assoc($answerResult);
            if($answer_num_rows>0){
                for($i=0;$i<$answer_num_rows;$i++){
                    $answerUserID=$answerRow['userID'];
                    $userName=getUserNameByID($db,$answerUserID);
                    $time=$answerRow['time'];
                    $answerContent=$answerRow['content'];
                    $supportCount=$answerRow['supportCount'];
                    $answerID=$answerRow['id'];

                    if($answerID!=$selectedAnswerID){
                        printAnswerToSelect($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$userID,$coin);
                    }
                    

                    $answerRow=mysqli_fetch_assoc($answerResult);
                }
            }            
        }

        function printAnswer($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$questionUserID){
            print ("
        <div class='answerItemDiv'>
            <div class='row'>
                <div class='col-md-1'>
                    <div class='row centerDiv'>
                        <div class='col-md-12'>
                            <button onclick='support($questionID,$answerID,$answerUserID,$questionUserID,1)' type='button' class='noBorderBtn btn btn-default tipsLeft' data-toggle='tooltip' data-placement='top' title='' data-original-title='Useful answer!' ><span class='glyphicon glyphicon-chevron-up'></span></button>
                        </div>
                        
                    </div>

                    <div class='row centerDiv'>
                        <div class='col-md-12'>
                            <span class='score cneterTD' id=$answerID>$supportCount</span>
                        </div>
                    </div>

                    <div class='row centerDiv'>
                        
                            <button onclick='support($questionID,$answerID,$answerUserID,$questionUserID,-1)' type='button' class='btn btn-default tipsLeft noBorderBtn' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='I don\"t think so...' ><span class='glyphicon glyphicon-chevron-down'></span></button>
                        
                    </div>
                </div>


                <div class='col-md-11'>
                    <div class='answerContent'>
                        <p>$answerContent</p>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-10'></div>
                <div class='col-md-2'>
                    <div class='peopleDiv'>
                        <img src='../home/userLogo.png' >
                        $userName
                        <p class='time'>$time</p>
                    </div>
                    
                </div>
            </div>

        </div>");
        }

        function printAnswerToSelect($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$questionUserID,$coin){
            print ("
        <div class='answerItemDiv'>
            <div class='row'>
                <div class='col-md-1'>
                    <div class='row centerDiv'>
                        <div class='col-md-12'>
                            <button onclick='support($questionID,$answerID,$answerUserID,$questionUserID,1)' type='button' class='noBorderBtn btn btn-default tipsLeft' data-toggle='tooltip' data-placement='top' title='' data-original-title='Useful answer!' ><span class='glyphicon glyphicon-chevron-up'></span></button>
                        </div>
                        
                    </div>

                    <div class='row centerDiv'>
                        <div class='col-md-12'>
                            <span class='score cneterTD' id=$answerID>$supportCount</span>
                        </div>
                    </div>

                    <div class='row centerDiv'>
                        
                            <button onclick='support($questionID,$answerID,$answerUserID,$questionUserID,-1)' type='button' class='btn btn-default tipsLeft noBorderBtn' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='I don\"t think so...' ><span class='glyphicon glyphicon-chevron-down'></span></button>
                        
                    </div>
                </div>


                <div class='col-md-11'>
                    <div class='answerContent'>
                        <p>$answerContent</p>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-10'></div>
                <div class='col-md-2'>
                    <div class='peopleDiv'>
                        <img src='../home/userLogo.png' >
                        $userName
                        <p class='time'>$time</p>
                    </div>
                    
                </div>
            </div>

            <div class='row selectAnswerDiv'>
                <div class='col-md-10'></div>
                <div class='col-md-2'>
                    <div class='rightDiv'>
                        <button onclick='selectAnswer($questionID,$answerID,$answerUserID,$coin)' type='button' class='btn btn-success btn-block tipsLeft' data-toggle='tooltip' data-placement='left' title='' data-original-title='Select as answer!' ><span class='glyphicon glyphicon-ok'></span></button>
                    </div>
                    
                </div>
            </div>

        </div>");            
        }        
        ?>
        
        

        
        
  
    </div><!--end container-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
    <script src="../askQ/question.js"></script>
    <script>
    function selectAnswer(questionID,answerID,answerUserID,coin){
        var formElement=$('#selectAnswer');
        formElement.attr("action","../include/selectAnswer.php");
        formElement.attr("method","post");
        var questionInput=$("<input type='hidden' name='questionID' value='"+questionID+"'>");
        var answerIDInput=$("<input type='hidden' name='answerID' value='"+answerID+"'>");
        var answerUserIDInput=$("<input type='hidden' name='answerUserID' value='"+answerID+"'>");
        var coinInput=$("<input type='hidden' name='coin' value='"+coin+"'>");
        formElement.append(questionInput);
        formElement.append(answerIDInput);
        formElement.append(answerUserIDInput);
        formElement.append(coinInput);
        formElement.submit();
    }
    </script>
	
</body>
</html>