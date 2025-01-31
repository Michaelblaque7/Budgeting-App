<?php

require_once "../classes/sanitize.php";
require_once "../classes/Appointment.php";

if(isset($_POST["btncomp"])){
    $name = sanitize($_POST["name"]);
    $email = sanitize($_POST["email"]);
    $msg = sanitize($_POST["message"]);
   

    if($name  === '' || $email === ""|| $msg=== ""){         
        $_SESSION['errormsg'] = "Please complete all fields.";
        header('location:../csupport.php');
        exit();

    }else{

            
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; 
            $comp = new Appointment;
            $comp->complaint($name, $email, $msg, $user_id);

            $_SESSION['feedback'] = "Your complaint has been lodged successfully ";
            header('location:../support.php');
            exit();
        } else {
            
            $_SESSION['errormsg'] = "Please log in to lodge a complaint.";
            header('location:../login.php');
            exit();
        }
        }

    }

  



?>