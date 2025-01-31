<?php

    session_start();

    unset($_SESSION['signedin']); 

    header("location:index.php");
?>