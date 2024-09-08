<?php
    ini_set("session.cookie_lifetime","3600");
    session_start();
    require_once('../config.php'); 
    if($_SESSION['utype'] !== 'jcoic'){
        header("location: ../login.php");
    }    
?>