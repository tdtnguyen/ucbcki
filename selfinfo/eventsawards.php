<?php
  /** Project: UCBCKI Under Construction
  ** My Events for Awards (eventsawards.php)
  **
  ** Author: Jerry Bao (jbao@berkeley.edu)
  ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
  ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
  ** Author: Sock Ryu (cki.sock@gmail.com)
  ** 
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "My Events for Awards";
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
    $event_ids = $userdb->getUserEvents($_SESSION['nimbus_user_id']);
    $homeclub = array();
    $dist = array();
    $div = array();
    $otherck = array();
    $kfam = array();
    foreach ($event_ids as $event_id) { 
      $event = $eventdb->getEventInfo($event_id); 
      if($event['status'] > 1){
        $tags = $event['tag_ids'];
        if(!(in_array(11, $tags) or in_array(15, $tags) or in_array(9, $tags))){
            $homeclub[] = $event;   
        }
        if(in_array(11, $tags)){
            $div[] = $event;
        }
        if(in_array(9, $tags)){
            $dist[] = $event;
        }
        if(in_array(5, $tags)){
            $otherck[] = $event;
        }
        if(in_array(17, $tags)){
            $kfam[] = $event;
        }
      }
    }
    usort($homeclub, 'dateOrder');
    usort($div, 'dateOrder');
    usort($dist, 'dateOrder');
    usort($otherck, 'dateOrder');
    usort($kfam, 'dateOrder');
  ?>        
  <div class="overlay container">
    <table class="table" >
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Service Hours</th>
          <th>Admin Hours</th>
          <th>Social Hours</th>
        </tr>
      </thead>
      <h1><? if ($_SESSION['nimbus_access'] > 0) { echo $_SESSION['nimbus_first_name'] . "'s "; } else { echo "My "; } ?>Events, Organized for Awards</h1>
      <p>Filter by: <a href="/~circlek/selfinfo/events.php">All Events</a>, <a href="/~circlek/selfinfo/committee.php">Committee Meetings</a>, <a href="/~circlek/selfinfo/kiwanis.php">Kiwanis Meetings</a>, <a href="/~circlek/selfinfo/chaired.php">Chaired Events</a></p>
      <h2>Home Club Events</h2>
      <tbody>
        <? foreach ($homeclub as $event) { 
            $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); ?>
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
  </div>
  <div class="overlay container">
    <table class="table" >
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Service Hours</th>
          <th>Admin Hours</th>
          <th>Social Hours</th>
        </tr>
      </thead>
      <h2>Division Events</h2>
      <tbody>
        <? foreach ($div as $event) { 
            $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); ?>
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
  </div>
  <div class="overlay container">
    <table class="table" >
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Service Hours</th>
          <th>Admin Hours</th>
          <th>Social Hours</th>
        </tr>
      </thead>
      <h2>District Events</h2>
      <tbody>
        <? foreach ($dist as $event) { 
            $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); ?>
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
  </div>
  <div class="overlay container">
    <table class="table" >
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Service Hours</th>
          <th>Admin Hours</th>
          <th>Social Hours</th>
        </tr>
      </thead>
      <h2>Other Club Events</h2>
      <tbody>
        <? foreach ($otherck as $event) { 
            $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); ?>
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
  </div>
  <div class="overlay container">
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
      <h2>Kiwanis Family Events</h2>
      <tbody>
        <? foreach ($kfam as $event) { 
            $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']); ?>
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
  </div>
  <div class="modal fade" id="usereventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <? require_once "../footer.php"; ?>
</body>
</html>