<?php

session_start();

if(!isset($_SESSION['auth'])){
    $_SESSION['status'] = "Login to access dashboard";
    header('location:login.php');
    exit(0);
}

?>