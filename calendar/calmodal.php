<?php
  ini_set('display_errors', 1);
  require_once('../admin/dbfunc.php'); 
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
  $id = $_GET["id"];
  $event = $eventdb->getEventInfo($id);
  session_start();
?>
<div class="modal-dialog modal-info">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">
        <?php echo $event['name'] ?>
      </h4>
    </div>
    <div id="event-details" class="modal-body">
      <p>
        <label>Chair</label>
        <span><?php $chair = $userdb->getUserInfo($event['chair_id']); echo $chair['first_name']; echo " "; echo $chair['last_name']; ?></span>
      </p>
      <p>
        <label>Start Date & Time</label>
        <span><?php echo date("F j, Y, g:i A",$event['start_datetime']); ?></span>
      </p>
      <p>
        <label>End Date & Time</label>
        <span><?php echo date("F j, Y, g:i A",$event['end_datetime']); ?></span>
      </p>
      <p>
        <label>Location</label>
        <span><?php echo $event['location']; ?></span>
      </p>
      <p>
        <label>Meeting Location</label>
        <span><?php echo $event['meeting_location']; ?></span>
      </p>
      <p>
        <label>Description</label>
        <br><?php echo $event['description']; ?>
      </p>
      <div>
   <? if (isset($_SESSION['nimbus_user_id'])) { $loggedin = true; }
      else { $loggedin = false; } 
      $signedup = false;
      $eventAttendees = $eventdb->getEventAttendees($event['event_id']);
      if ($loggedin) { ?>
        <p><label>Confirmed Attendees</label></p>
        <ul>
     <? if ($eventAttendees) {
          foreach ($eventAttendees as $eventAttendee) { ?>
            <li><i class="fa fa-check fa-fw"></i> <?= $eventAttendee['first_name']?> <?= $eventAttendee['last_name']; ?></li>
         <? if ($eventAttendee['user_id'] == $_SESSION["nimbus_user_id"]) { $signedup = true; }
          }
        } else { ?>
          <li>No attendees.</li> <?
        } ?>
        </ul> <?
      } else { $numAttendees = count($eventAttendees); ?>
        <p><label>Number of Attendees</label><span><?= $numAttendees; 
      if ($numAttendees > 0) { echo " (login to see list)"; } ?></span></p>
   <? } ?>
      </div>
    </div>
    <div class="modal-footer">
    <? if ($loggedin) {
        if ($event['online_signups']) {
          if ($event['online_end_datetime'] < time()) { ?>
            <label>Sign-ups are closed!</label>
            <label>Contact <?php $chair = $userdb->getUserInfo($event['chair_id']); echo $chair['first_name']; echo " "; echo $chair['last_name']; ?> if you still want to attend.</label>
          <? } else if (!$signedup) { ?>
            <form action="/~circlek/calendar/eventsignup.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="event_id" value="<?= $event['event_id'] ?>">
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
          <? } else { ?>
            <form action="/~circlek/calendar/notattending.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="event_id" value="<?= $event['event_id'] ?>">
              <button type="submit" class="btn btn-primary">Remove</button>
            </form>
          <? } ?>
        <? } else { ?>
          <label>No online sign-ups are allowed for this event.</label>
        <? } ?>
    <? } else { ?> 
      <label>Please login to sign-up for this event.</label>
    <? } ?>
    </div>
  </div>
</div>