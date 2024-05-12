<?php

$host = "localhost";
$user = "root";
$password = null;
$database = "phpadminpanel";

$conn = new mysqli($host,$user,$password,$database);

if(!$conn){
    // header('location:../errors/db.php');
    die(mysqli_error($conn));
}else{
    // echo "success";
}

?>