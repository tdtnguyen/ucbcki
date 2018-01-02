<?php
  /** Project Name: Nimbus (Circle K Club Management)
   ** MRP Levels (mrp.php)
   **
   ** Author: Jerry Bao (jbao@berkeley.edu)
   ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
   ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
   ** Author: Sock Ryu (cki.sock@gmail.com)
   ** Author: Tao Ong (cki.taoong@gmail.com)
   **
   ** CIRCLE K INTERNATIONAL
   ** COPYRIGHT 2014-2015 - ALL RIGHTS RESERVED
   **/

  session_start();
  if (!isset($_SESSION['nimbus_user_id'])) {
      $_SESSION['logged_out'] = "Due to inactivity, you have been logged out.";
      header('Location: https://www.ocf.berkeley.edu/~circlek/index.php');
  }
  require_once("../admin/dbfunc.php");
  $userdb = new UserFunctions;
  $eventdb = new EventFunctions;
  $committeedb = new CommitteeFunctions;

  $pageTitle = "MRP Levels";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <? require_once "../header.php"; ?>
</head>
<body>
  <div class="nav-placeholder"></div>
  <?
    error_reporting(E_ERROR | E_PARSE);
    $socials = 0;
    $mde = 0;
    $fund = 0;
    $ck = 0;
    $kfam = 0;
    $in = 0;
    $division = 0;
    $dist = 0;
    $inter = 0;
    $chair = 0;
    $commiteemem = 0;
    $user = $userdb->getUserInfo($_SESSION['nimbus_user_id'], true);
    $event_ids = $userdb->getUserEvents($_SESSION['nimbus_user_id']);
    $events = array();
    foreach ($event_ids as $event_id) {
        $event = $eventdb->getEventInfo($event_id);
        if($event['status'] >0){
            $events[] = $event;
        }
    }
    foreach ($events as $event) {
        $tags = $event['tag_ids'];
        if(in_array(19, $tags)){
            $socials += 1;
        }
        if(in_array(18, $tags)){
            $mde += 1;
        }
        if(in_array(12, $tags)){
            $fund += 1;
        }
        if(in_array(5, $tags)){
            $ck += 1;
        }
        if(in_array(17, $tags)){
            $kfam += 1;
        }
        if(in_array(14, $tags)){
            $in += 1;
        }
        if(in_array(11, $tags)){
            $division += 1;
        }
        if(in_array(9, $tags)){
            $dist += 1;
        }
        if(in_array(15, $tags)){
            $inter += 1;
        }
        if($event['chair_id'] == $_SESSION['nimbus_user_id']){
            $chair += 1;
        }

    }
    $committees = $committeedb->getCommittees();
    foreach ($committees as $com ) {
        foreach ($com['members'] as $mem) {
            if ($_SESSION['nimbus_user_id'] == $mem['user_id']){
                $commiteemem += 1;
            }
        }
    }
  ?>
  <div class="container mrp-panel">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1>Membership Recognition Program</h1>
        <p>(must be a Dues Paid Member to attain MRP status)</p>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Requirement</th>
                    <th class="user">My Status</th>
                    <th>Bronze</th>
                    <th>Silver</th>
                    <th>Gold</th>
                    <th>Platinum</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Service Hours</td>
                    <td class="user milestone"><?= $user['hours']['service_hours']?></td>
                    <td class="milestone">40</td>
                    <td class="milestone">80</td>
                    <td class="milestone">120</td>
                    <td class="milestone">160</td>
                  </tr>
                  <tr>
                    <td># Socials(SE)</td>
                    <td class="user"><?= $socials?></td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                  </tr>
                  <tr>
                    <td># MD&E Events (MD)</td>
                    <td class="user"><?= $mde ?></td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td># Fundraisers (FR)</td>
                    <td class="user"><?= $fund ?></td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td># Circle K Hosted Events (CK)</td>
                    <td class="user"><?= $ck ?></td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td># Kiwanis Family</td>
                    <td class="user"><?= $kfam ?></td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td># Interclub (IN)</td>
                    <td class="user"><?= $in ?></td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td># Divisonal Events (DV)</td>
                    <td class="user"><?= $division ?></td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td># District Events</td>
                    <td class="user"><?= $dist ?></td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td># International Events (INT)</td>
                    <td class="user"><?= $inter ?></td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Dues Paid?</td>
                    <td class="user"><?if($user['dues_paid']){?>
                        <i class="fa fa-check fa-fw"></i>
                    <?}?></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                  </tr>
                  <tr>
                    <td>Additional Requirements</td>
                    <td class="user"></td>
                    <td>6</td>
                    <td>8</td>
                    <td>9</td>
                    <td>11</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Articles Submitted</td>
                    <td class="user"></td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>Webinars Attended</td>
                    <td class="user"></td>
                    <td>2</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>Chaired Events</td>
                    <td class="user"><?= $chair ?></td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>Hosted District Workshop or Webinar?</td>
                    <td class="user"></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                  </tr>
                  <tr>
                    <td>Club Committee Member?</td>
                    <td class="user">
                      <? if ($commiteemem) {?>
                        <i class="fa fa-check fa-fw"></i>
                      <? } else { ?>
                        <i class="fa fa-times fa-fw"></i>
                      <? } ?>
                    </td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                    <td><i class="fa fa-check fa-fw"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<? require_once "../footer.php"; ?>
</body>
</html>
