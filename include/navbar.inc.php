<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header"> <a href="../index.php"><img src="../home/logoIcon.png" class="logoIcon" ></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <div class="navbar-collapse collapse myNavBar">
      <ul class="nav navbar-nav">
        <li><a href="../askQ/tagList.php">Tags</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="../index.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control navbarForm" name="keywords" placeholder="Search">
          <input type="hidden" name="iCheck" value='0'>
          <input type="hidden" name="submitted" value="true">
        </div>
        <button type="submit" class="btn btn-default" style="margin-left:5px" >Search</button>
      </form>

          <div class="navbar-form navbar-right">
            <div class="form-group">
              <button class="btn btn-md btn-default" id="askButton">Ask question</button>
            </div>
          </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
          <?php
          if(isset($messageCount)&&($messageCount!=0)){
                print "<span class='badge'> $messageCount </span>";
          }else{
                print "";
          }
          ?>
          </a>
          <ul class="dropdown-menu">
            <li><a href="../home/Homepage.php">Home</a></li>
            <li><a href="../include/signOut.php">Sign out</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<!--navibar ends-->