<?php 
/** Project Name: Nimbus (Circle K Club Management)
 ** Logout (logout.php)
 **
 ** Author: Jerry Bao (jbao@berkeley.edu)
 ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
 ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
 ** Author: Sock Ryu (cki.sock@gmail.com)
 ** 
 ** CIRCLE K INTERNATIONAL
 ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
 **/
session_start();
unset($_SESSION['nimbus_user_id']);
unset($_SESSION['nimbus_access']);
unset($_SESSION['nimbus_first_name']);
unset($_SESSION['nimbus_last_name']);
$location ='Location: '.$_GET['url'];
header($location);
?>