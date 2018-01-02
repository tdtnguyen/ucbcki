<?php
  ini_set('display_errors', 1);
  require_once('../admin/dbfunc.php');
  session_start();
  if (!isset($_SESSION['nimbus_user_id'])) { 
      $_SESSION['logged_out'] = "Due to inactivity, you have been logged out."; 
      header('Location: https://www.ocf.berkeley.edu/~circlek/index.php'); 
  }
  $eventdb = new EventFunctions;
  $userdb = new UserFunctions;
  $tagdb = new TagFunctions;
  $id = $_GET["id"];
  $event = $eventdb->getEventInfo($id);
  $hours = $userdb->getUserHoursByEvent($_SESSION['nimbus_user_id'],$event['event_id']);
?>
<div id="self-info" class="modal-dialog modal-info">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">
        <?php echo $event['name'] ?>
      </h4>
    </div>
    <div class="modal-body">
      <p>
        <label>Event Name</label>
        <span><?= $event['name'] ?></span>
      </p>      
      <p>
        <label>Chair</label>
        <? $chair = $userdb->getUserInfo($event['chair_id']) ?>
        <span><?= $chair['first_name'] ?> <?= $chair['last_name'] ?></span>
      </p>      
      <p>
        <label>Start Date and Time</label>
        <span><?= date("F j, Y, g:i a", $event['start_datetime']); ?></span>
      </p>      
      <p>
        <label>End Date and Time</label><span>
        <span><?= date("F j, Y, g:i a", $event['end_datetime']); ?></span>
      </p>      
      <p>
        <label>Location</label>
        <span><?= $event['location'] ?></span>
      </p>      
      <p>
        <label>Service Hours</label>
        <span><?= $hours['service_hours']?></span>
      </p>      
      <p>
        <label>Admin Hours</label>
        <span><?= $hours['admin_hours']?></span>
      </p>
      <p>
        <label>Social Hours</label>
        <span><?= $hours['social_hours']?></span>
      </p>                 
      <p>
        <label>Tags</label>
        <ul>
          <? foreach ($event['tag_ids'] as $tag_id) { 
            $tag = $tagdb->getTag($tag_id); ?>
            <li><i class="fa fa-tag fa-fw"></i><?= $tag['abbr'] ?> (<?= $tag['name'] ?>)</li>
          <? } ?>
        </ul>
      </p>
      <p>
        <label>All Attendees</label>
        <? $eventAttendees = $eventdb->getEventAttendees($event['event_id']); ?>
        <ul>
        <? foreach ($eventAttendees as $eventAttendee) { ?>
            <li><i class="fa fa-check fa-fw"></i> <?= $eventAttendee['first_name']?> <?= $eventAttendee['last_name']; ?></li>
        <? } ?>
        </ul> 
    </div>
  </div>
  <div class="modal-footer">
  </div>
</div>