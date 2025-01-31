<?php
    if(!isset($_SESSION["admin_id"])){
        $_SESSION["login_error"] = "You Must be logged in to access this page";
        header("location:login.php");
        exit;
    }
?>