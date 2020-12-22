<?php
    $file_path = realpath(dirname(__FILE__));
    include ($file_path."/../config/config.php"); 
?>

<?php
    //connect
    $host_name = DB_HOST  ;
    $db_name =  DB_NAME ;
    $username = DB_USER  ;
    $password = DB_PASS; 
    try {
        $connect = new PDO ("mysql:host=$host_name; dbname=$db_name" , $username , $password) ;
        $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
        $connect->exec("set names utf8");
        //echo "success" ;
    }
    catch(PDOException $e){
        echo $e->getMessage() ;
    }
?>