<?php
  /** Project: UCBCKI Under Construction
  ** Update My Info (updateinfo.php)
  **
  ** Author: Jerry Bao (jbao@berkeley.edu)
  ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
  ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
  ** Author: Sock Ryu (cki.sock@gmail.com)
  **
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "Update Info";
  session_start();
  ini_set('display_errors', 1);
  if (!isset($_SESSION['nimbus_user_id'])) {
      $_SESSION['logged_out'] = "Due to inactivity, you have been logged out.";
      header('Location: https://www.ocf.berkeley.edu/~circlek/index.php');
  }
  require_once "../admin/dbfunc.php";
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
?>

<!DOCTYPE html>
<html>
<head>
  <? require_once "../header.php"; ?>
</head>
<body>
  <div class="nav-placeholder"></div>
  <div id="update-info" class="container col-md-9 overlay">
    <h1>Welcome, <? if ($_SESSION['nimbus_access'] > 0) { echo $_SESSION['nimbus_first_name']; } else { echo "please log in"; } ?>.</h1>
    <p>Please only fill out/edit fields that you would like to change. Enter your current password to validate your changes.</p>
    <form action="accountupdates.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Current Password</label>
        <input required name="current_password" class="form-control" type="password" class="input-medium">
      </div>
       <? $userData = $userdb->getUserInfo($_SESSION['nimbus_user_id']); ?>
      <div class="form-group">
        <label>New Password</label>
        <input name="password" class="form-control" type="password" class="input-medium">
      </div>
      <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="email" value="<?= $userData['email']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="phone" value="<?= $userData['phone']; ?>" class="form-control phone" required>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
      <button type="reset" class="btn btn-success" id="resetfields">Reset Fields</button>
    </form>
  </div>
  <? include "../footer.php"; ?>
</body>
</html>
