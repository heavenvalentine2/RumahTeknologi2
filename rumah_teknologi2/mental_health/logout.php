<?php
session_start();
require "functions.php";

if (isset($_SESSION['NIS'])) {

    $acc_status = "Offline";

    $update_query = "UPDATE user 
    SET acc_status = '$acc_status' WHERE NIS = " . $_SESSION['NIS'] . "";
    cud($update_query);
}

session_destroy();
session_unset();
$_SESSION = [];

header('location: login.php');
exit();
?>