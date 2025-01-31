<?php
session_start();

require_once "../classes/sanitize.php";
require_once "../classes/Appointment.php";

if(isset($_POST['btndp'])){
    $fn = sanitize($_POST["deposit_amt"]);
    $cn = sanitize($_POST["user_goal_name"]);
    $gn = $_POST["user_category"];
     
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $cl = new Appointment;
        $insertResult = $cl->insert_dep($fn, $cn, $gn, $user_id);

        if ($fn === '' || $cn === '' || $gn === '') {
            $_SESSION['errormsg'] = "Please complete all fields.";
            header('location:../insight.php');
            exit();
        }
    
        
        if (!is_numeric($fn) || $fn <= 0) {
            $_SESSION['errormsg'] = "Please enter a valid deposit amount.";
            header('location:../insight.php');
            exit();
        }

        if($insertResult){
            $_SESSION['feedback'] = "Deposit Successful";
            header('location:../insight.php');
            exit();
        }else{
            $_SESSION['errormsg'] = "An error occured while processing your deposit. Please try again";
            header('location:../insight.php');
            exit();
        }

    }else{
        $_SESSION['errormsg'] = "Try again";
        header('location:../insight.php');
        exit();
    }
}





?>