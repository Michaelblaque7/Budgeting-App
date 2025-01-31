<?php
session_start();


require_once "../classes/sanitize.php";
require_once "../classes/Appointment.php";

if(isset($_POST["btncrt"])){
    $gn = sanitize($_POST["user_goal_name"]);
    $ged = sanitize($_POST["user_end_date"]);
    $gta = sanitize($_POST["user_target_amt"]);
    $gd = sanitize($_POST["goal_desc"]);
    $gct = $_POST["user_category"];
    

    if($gn === '' || $ged === ""|| $gta === "" || $gd === "" || $gct === ""){         
        $_SESSION['errormsg'] = "Please complete all fields.";
        header('location:../create_savings.php');
        exit();

    }else{

            
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; 
            $cr = new Appointment;
            $cr->create_goal($gn, $ged, $gta, $gd, $gct, $user_id);

            $_SESSION['feedback'] = "A new goal has been created for you";
            header('location:../insight.php');
            exit();
        } else {
            
            $_SESSION['errormsg'] = "Please log in first.";
            header('location:../login.php');
            exit();
        }
        }

    }

  



?>