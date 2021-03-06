
<?php
  /** Project: UCBCKI Under Construction
  ** My Tagged Events (tagevent.php)
  **
  ** Author: Jerry Bao (jbao@berkeley.edu)
  ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
  ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
  ** Author: Sock Ryu (cki.sock@gmail.com)
  ** 
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "My Kiwanis Events";
  session_start();
  ini_set('display_errors', 1);
  if (!isset($_SESSION['nimbus_user_id'])) { 
      $_SESSION['logged_out'] = "Due to inactivity, you have been logged out."; 
      header('Location: https://www.ocf.berkeley.edu/~circlek/index.php'); 
  }
  require_once "../admin/dbfunc.php";
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
  $user = $userdb->getUserInfo($_SESSION['nimbus_user_id'], true);
?>

<!DOCTYPE html>
<html>
<head> 
  <? require_once "../header.php"; ?>
</head>
<body class="my-stats">
  <div class="nav-placeholder"></div>
  <? function dateOrder($a, $b){
      return (int) $b['start_datetime'] -  (int) $a['start_datetime'] ;
    }
    $event_ids = $eventdb->getEventTags($_GET['tag']);
    $events = array();
    foreach ($event_ids as $event_id) { 
      $event = $eventdb->getEventInfo($event_id); 
      if($event['status'] > 1){
          $events[] = $event;
      }
    }
    usort($events, 'dateOrder')
  ?>        
  <div class="overlay col-sm-8 col-sm-offset-2">
    <table class="table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Service Hours</th>
          <th>Admin Hours</th>
          <th>Social Hours</th>
        </tr>
      </thead>
      <h1><?= $_SESSION['nimbus_first_name']; ?>'s Events</h1>
      <p>Filter by: <a href="/~circlek/selfeventsawards.php">Award Categories</a>, <a href="/~circlek/selfcommittee.php">Committee Meetings</a>, <a href="/~circlek/selfkiwanis.php">Kiwanis Meetings</a>, <a href="/~circlek/selfchair.php">Chaired Events</a></p>
      <tbody>
      <? foreach ($events as $event) { 
          $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); 
            ?>
        <tr>
          <td><? echo date("n/j/y", $event['start_datetime']); ?></td>
          <td>
            <a onClick="javascript:usermodalOpen(<?= $event['event_id'] ?>);"> <? echo $event['name']; ?> </a>
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
          </td>
          <td><? echo  $hours['service_hours']?></td>
          <td><? echo  $hours['admin_hours']?></td>
          <td><? echo  $hours['social_hours']?></td>
        </tr>
      <? } ?>
      </tbody>
    </table>
    <div class="totals">
      <h3>Totals</h3>
      <label>Service Hours:</label>
      <p><?= $user['hours']['service_hours'] ?></p>
      <label>Admin Hours:</label>
      <p><?= $user['hours']['admin_hours'] ?></p>
      <label>Social Hours:</label>
      <p><?= $user['hours']['social_hours'] ?></p>
    </div>
  </div>
  <div class="modal fade" id="usereventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <? require_once "../footer.php"; ?>
</body>
</html>