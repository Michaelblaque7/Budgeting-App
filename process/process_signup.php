<?php
    session_start();
    require_once "../classes/sanitize.php";
    require_once "../classes/Appointment.php";
    if(isset($_POST["btnsg"])){
        $fname = sanitize($_POST["firstname"]);
        $lname = sanitize($_POST["lastname"]);
        $email = sanitize($_POST["email"]);
        $password = $_POST["password"];
        $confirmpass = $_POST["password1"];
        
        if($fname === '' || $lname === ""|| $email === "" || $password === "" || $confirmpass === ""){
            $_SESSION['errormsg'] = "Please complete all fields.";
            header('location:../signup.php');
            exit();

        }elseif($password != $confirmpass){
            $_SESSION['errormsg'] = "The two passwords must match";
            header('location:../signup.php');
            exit();

        }else{
            $a = new Appointment;
            $record = $a->sign_up($fname, $email, $password, $lname);
            if($record){
                $_SESSION['feedback'] = "An account has been created for you, please login";
                header('location:../login.php');
                exit();
            }else{
                $_SESSION['errormsg'] = "Error creating account, please try again";
                header("location:../signup.php");
                exit();
            }
        }
    }else{
        $_SESSION["errormsg"] = "Please sign up properly";
        header("location: ../signup.php");
        exit();
    }
?>