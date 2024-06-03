<?php

session_start();

// unset($_SESSION['auth']);
session_destroy();
// $_SESSION['status'] = "Logged out successfully";
// header('location:login.php');
exit(0);

?>