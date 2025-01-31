<?php

session_start();
require_once "../classes/sanitize.php";
require_once "../classes/Oversight.php";

if(isset($_POST["btnadd"])){
    $add = sanitize($_POST["addct"]);
    if($add === ''){         
        $_SESSION['errormsg'] = "Please input a category";
        header('location:../add_category.php');
        exit();
    
    }else{
        $dd = new Oversight;
        $dd->insert_category( $add);
        $_SESSION['feedback'] = "Category added successfully";
        header('location:../dashboard.php');
    }
}


?>