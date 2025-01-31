<?php

require_once "classes/Appointment.php";

$goalid = $_GET['id']; 
if (isset($goalid) && !empty($goalid)) {
    $del = new Appointment;
    $del->delete_goal($goalid);

    echo "User with ID: $goalid has been deleted.";
} else {
    echo "No user provided!";
}

header('Location: transactions.php');
exit;  


?>