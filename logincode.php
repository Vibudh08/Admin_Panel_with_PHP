<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if($row){

        $data = $result->fetch_assoc();
        
        if($data['password'] != $password){
            $_SESSION['status'] = "Password is wrong";
            header('location:login.php');
        }elseif ($data['role_as'] == 0) {
            $_SESSION['status'] = "User is Not Authorised";
            header('location:login.php');
        }else{
            $role_as = $data['role_as'];
            $id = $data['id'];
            $name = $data['name'];
            $_SESSION['auth'] = $role_as;
            $_SESSION['username'] = $name;
            $_SESSION['id'] = $id;
            $_SESSION['status'] = "Welcome $name";
            header('location:index.php');
            
        }

    }else{
        $_SESSION['status'] = "Email is not registered";
        header('location:login.php');
    }
}

?>