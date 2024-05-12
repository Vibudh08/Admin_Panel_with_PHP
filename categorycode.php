<?php
include('config/dbcon.php');



// FOR ADDING CATEGORY

if(isset($_POST['category_save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $categoryquery = "INSERT INTO categories(name, description, trending, status) VALUES('$name','$description','$trending','$status')";
                
        $result = mysqli_query($conn,$categoryquery);
        
        if($result){
            // echo "data added";
            $_SESSION['status'] = "Added Successfully";
            header('location:category.php');
        }else{
            $_SESSION['status'] = "Addition failed";
            header('location:category.php');
            // mysqli_error($conn);
        }
}


// FOR UPDATING CATEGORY


if(isset($_POST['updateCategory'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $categoryquery = "UPDATE categories set name='$name', description='$description', trending='$trending', status='$status' where id='$id'";
                
        $result = mysqli_query($conn,$categoryquery);
        
        if($result){
            // echo "data added";
            $_SESSION['status'] = "Updated Successfully";
            header('location:category.php');
        }else{
            $_SESSION['status'] = "Updation failed";
            header('location:category.php');
            // mysqli_error($conn);
        }
}


// FOR DELETING CATEGORY

if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;

    $sql = "DELETE FROM categories where id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['status'] = "Deleted Successfully";
        header('location:category.php');
    }else{
        $_SESSION['status'] = "Deletion failed";
        header('location:category.php');
        // mysqli_error($conn);
    }
}


?>