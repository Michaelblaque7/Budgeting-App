<?php
session_start();

require_once "../classes/sanitize.php";
require_once "../classes/Appointment.php";

if(isset($_POST['btndp'])){
    $withdraw = sanitize($_POST["withdraw_amt"]);
    $gname = sanitize($_POST["user_goal_name"]);
    $cate = $_POST["user_category"];
     
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $draw = new Appointment;
        $insertResult = $draw->withdraw($withdraw, $gname, $cate, $user_id);
        

        if ($withdraw === '' || $gname === '' || $cate === '') {
            $_SESSION['errormsg'] = "Please complete all fields.";
            header('location:../insight.php');
            exit();
        }
    
        
        if (!is_numeric($withdraw) || $withdraw <= 0) {
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
        $_SESSION['errormsg'] = "Try again ";
        header('location:../insight.php');
        exit();
    }
}





?>