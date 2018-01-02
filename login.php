<?php
/** Project Name: Nimbus (Circle K Club Management)
 ** Logout (login.php)
 **
 ** Author: Jerry Bao (jbao@berkeley.edu)
 ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
 ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
 ** Author: Sock Ryu (cki.sock@gmail.com)
 ** 
 ** CIRCLE K INTERNATIONAL
 ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
 **/
ini_set('display_errors', 1);
include_once("admin/dbfunc.php");
$db = new UserFunctions;
$userData = $db->login($_POST['username'], $_POST['password']);
session_start();
if ($userData) {
    $_SESSION['nimbus_user_id'] = $userData['user_id'];
    $_SESSION['nimbus_access'] = $userData['access'];
    $_SESSION['nimbus_first_name'] = $userData['first_name'];
    $_SESSION['nimbus_last_name'] = $userData['last_name'];
    // if (isset($_POST['rememberme'])) {
    // 	setcookie('username', $_POST['username'], time()+60*60*24*7, '/~circlek/', 'www.ocf.berkeley.edu');
	   //  setcookie('password', md5($_POST['password']), time()+60*60*24*7, '/~circlek/', 'www.ocf.berkeley.edu');
    // }
    $location = "Location: ".$_POST['url'];
} else { 
	$_SESSION['error_login'] = "Login unsuccessful. Your username or password was incorrect.";
	$location = "Location: ".$_POST['url'];
} 
header($location);
?>