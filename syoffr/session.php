<?php session_start();
    require_once('../config.php'); 
    if($_SESSION['utype'] !== 'syoffr'){
    header("location: ../login.php");
    }    
?>