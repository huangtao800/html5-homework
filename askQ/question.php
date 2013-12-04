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
    <link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../home/home.css">
  	<link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../css/common.css">
  	<link rel="stylesheet" href="../askQ/ask.css">
    <link rel="stylesheet" href="../askQ/question.css">
    <link href="../Font-Awesome-3.0.2/css/font-awesome.css" rel="stylesheet">
    
    <script type="text/javascript">
    function support(questionID,answerID,answerUserID,questionUserID,supportCount){
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                var result=xmlhttp.responseText;
                
                document.getElementById(answerID).innerHTML=result;
            }
          }
          xmlhttp.open("GET","../include/support.php?support="+supportCount+"&answerID="+answerID+"&questionID="+questionID+"&questionUserID="+questionUserID+"&answerUserID="+answerUserID,true);
          xmlhttp.send();
    }
    </script>
    
</head>

<body>
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
                
                printAnswer($questionID,$answerUserID,$userName,$time,$answerContent,$supportCount,$answerID,$userID);

                $answerRow=mysqli_fetch_assoc($answerResult);
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
        ?>
        
        
        
        

        <div>
            <h3 class="myFont">Your Answer</h3>
            <div class="yourAnswerDiv">
                <form id="answerForm" method="post">
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                        </div>
                    </div>
                    <div id="editor" name="answerContent"></div>                    
                    <input type="hidden" name="submitted" value="true">
                </form>
                <button class="btn btn-lg btn-primary" onclick=<?php print"postAnswer($questionID)" ?> >Submit your answer</button>
            </div>
        </div>


        
  
    </div><!--end container-->
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../js/jquery.hotkeys.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/inputEditor.js"></script>
    <script src="../askQ/question.js"></script>
	
</body>
</html>