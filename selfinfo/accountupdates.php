<?php
    ini_set('display_errors', 1);
    session_start();
    include_once('../admin/dbfunc.php');
    $db = new UserFunctions;
    if ($db->verifyUserPassword($_SESSION['nimbus_user_id'], $_POST['current_password'])) {
        $db->setEmail($_SESSION['nimbus_user_id'], $_POST['email']);
        $db->setPhone($_SESSION['nimbus_user_id'], $_POST['phone']);
        if( "" != $_POST['password']){
            $db->setPassword($_SESSION['nimbus_user_id'], password_hash($_POST['password'], PASSWORD_BCRYPT));
        }
    }
    $location = "Location: ../index.php"; 
    header($location);
?>