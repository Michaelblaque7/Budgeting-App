<?php
session_start();
    require_once "../classes/sanitize.php";
    require_once "../classes/Appointment.php";
    
    if(isset($_POST['btngo'])){
        
        $email = sanitize($_POST['email']);
        $password= $_POST['password'];

        if(empty($email) || empty($password)){
            $_SESSION['errormsg']="Please complete the fields";
            header("location:..login.php");
        }else{
            $u = new Appointment;
        $user_online = $u->login($email,$password);
        if($user_online){
            $_SESSION['user_id']=$user_online;
            header("location:../home.php");
            exit;
        }else{
            header("location:../login.php");
            exit;
        }

        }
    }else{
        $_SESSION['errormsg']="Please complete the form";
        header("location:..login.php");
    }


?>
