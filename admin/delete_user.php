<?php

require_once "classes/Oversight.php";

$userid = $_GET['id']; 
if (isset($userid) && !empty($userid)) {
    $del = new Oversight;
    $del->delete($userid);

    echo "User with ID: $userid has been deleted.";
} else {
    echo "No user provided!";
}

header('Location: view_user.php');
exit;  



?>