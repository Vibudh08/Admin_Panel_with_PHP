<?php
session_start();
include('config/dbcon.php');

// FOR ADDING USER

if(isset($_POST['addUser'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $email_query = "SELECT * FROM user where email='$email'";
    $email_result = mysqli_query($conn,$email_query);
    $email_row = mysqli_num_rows($email_result);

    if($email_row>0){
        $_SESSION['status'] = "Email already registered";
        header('location:register.php');

    }else{
        if(empty($name) or empty($email) or empty($phone) or empty($password) or empty($c_password)){
            $_SESSION['status'] = "Please fill all fields";
            header('location:register.php');
            
            // echo "fill all fields";
        }else{
            if($password != $c_password){
                $_SESSION['status'] = "Passwords don't match";
                header('location:register.php');
                
            }else{
            
                $query = "INSERT INTO user(`name`,`email`,`phone`,`password`) VALUES('$name','$email','$phone','$password')";
                
                $result = mysqli_query($conn,$query);
                
                if($result){
                    // echo "data added";
                    $_SESSION['status'] = "Registered Successfully";
                    header('location:register.php');
                }else{
                    $_SESSION['status'] = "Registeration failed";
                    header('location:register.php');
                    // mysqli_error($conn);
                }
            }
        }
    }

}

// FOR UPDATING USER


if(isset($_POST['updateUser'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];


    $sql = "UPDATE user set name='$name', email='$email', phone='$phone', password='$password', role_as='$role_as' where `id`='$id'";

    $result = mysqli_query($conn,$sql);

    if($result){
        $_SESSION['status'] = "Updated Successfully";
        header('location:register.php');
    }else{
        $_SESSION['status'] = "Updation failed";
        header('location:register.php');
        // mysqli_error($conn);
    }
}

// FOR DELETING USER

if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;

    $sql = "DELETE FROM user where id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['status'] = "Deleted Successfully";
        header('location:register.php');
    }else{
        $_SESSION['status'] = "Deletion failed";
        header('location:register.php');
        // mysqli_error($conn);
    }
}
?>