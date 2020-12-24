<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["role"]); 
    unset($_SESSION["userId"]);
    unset($_SESSION["userEmail"]);
    //session_destroy() ; 
    header("Location: login.php") ;
?>