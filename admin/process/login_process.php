<?php
    session_start();
    require_once "../classes/sanitize.php";
    require_once "../classes/Oversight.php";
    require_once "../hash.php";
        
    if(isset($_POST["btngo"])){
        $username = sanitize($_POST["username"]);
        $password = $_POST["password"];
        
        if(empty($username) || empty($password)){
            $_SESSION["login_error"] = "All fields are required";
            header("location:../login.php");
            exit;
        }

        $us = new Oversight;
        $admin = $us->login($username, $password); 
       
        if($admin){
            $_SESSION["admin_id"] = $admin;
            header("location:../dashboard.php");
            exit;
            
        }else{
            $_SESSION["login_error"] = "Invalid Login details, please try again";
            header("location:../login.php");
            exit;
        }
       

    }else{

        $_SESSION["login_error"] = "Please fill the form";
        header("location:../login.php");
        exit;

    }