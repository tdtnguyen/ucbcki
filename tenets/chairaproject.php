<?php
  /** Project: UCBCKI Under Construction
  ** Chair a Project (chairaproject.php)
  **
  ** Author: Sock Ryu (cki.sock@gmail.com)
  **
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "Chair A Project";
?>

<!DOCTYPE html>
<html>
<head>
  <? require_once "../header.php"; ?>
</head>
<body class="chairs">
      <img class="chair-pics" src="/~circlek/images/somethingsCooking2.gif">

  <?php require_once "../footer.php"; ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <? require_once "../header.php"; ?>
</head>
<body class="chairs">
  <div class="nav-placeholder"></div>
  <div id="chair-banner" class="jumbotron">
    <div class="container">
      <span>
      <h1>Chair A Project</h1>
      <!--<h3>Recently chaired a project? Submit <a href="https://docs.google.com/forms/d/1Eer5Z_kdr35CxI8fv2tHRl-q1x2BLv_xnIf2p28P_-0/viewform" target="_blank">your report in this Google form</a>. Thanks for stepping up!</h3>-->
      </span>
    </div>
  </div>
  <div class="container overlay">
    <div class="col-sm-4">
      <div id="chair" class="featurette-image"></div>
    </div>
    <div id="chair-description" class="col-sm-8">
      <h2>Chairs are Cool</h2>
      <p>Interested in getting a little more involved with Circle K? Do you want leadership experience while being part of team and helping others at the same time? The Chair-A-Project program aims to do just that! By chairing a project, members can put their leadership skills into practice by leading a small group of people into one of our continuous service projects, enriching their own leadership value and harboring the bonds and friendship that come from volunteering through Circle K.</p>
      <p>Chairing a project requires no experience and is a lot easier than it sounds, usually involving sending out interest and thank you emails, interacting with those who signed up, and general supervision of the event. If you’re nervous to chair a project, try co-chairing with a friend or make a new friend in the process! If you’d like to know more or have any questions, please let any board member know! :)</p>
      <p class="text-muted"><span>Java Villano, <em>Projects Coordinator</em></span></p>
      <p>Interested in chairing a service project? Send Java an email! <a href="mailto:cki.javavillano@gmail.com" target="_top">cki.javavillano@gmail.com</a></p>
    </div>
    <div class="col-sm-12">
      <h2>We really, really like our chairs. So much so we definitely did not photoshop them sitting on chairs.</h2>
    </div>
    <div class="col-sm-2">
      <img class="chair-pics" src="/~circlek/images/wut/Chair Alyssa.jpg">
    </div>
    <div class="col-sm-2">
      <img class="chair-pics" src="/~circlek/images/wut/Chair Heyun.jpg">
    </div>
    <div class="col-sm-5">
      <img class="chair-pics" src="/~circlek/images/wut/chairtha reclianer.jpg">
    </div>
    <div class="col-sm-2">
      <img class="chair-pics" src="/~circlek/images/wut/chair sarah.jpg">
    </div>

  </div><!-- /.container -->

  <!-- add a form later for recent chairs to report events -->

  <?php require_once("../footer.php") ?>
</body>
</html>
