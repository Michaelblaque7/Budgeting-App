<?php 

    $pass = "password123";
    $hashed = password_hash($pass, PASSWORD_DEFAULT); 
    echo $hashed; 


?>