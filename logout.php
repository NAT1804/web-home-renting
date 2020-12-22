<?php
    session_start();
    unset($_SESSION["Username"]);
    unset($_SESSION["Role"]); 
    unset($_SESSION["UserId"]);
    //session_destroy() ; 
    header("Location:login.php") ;
?>