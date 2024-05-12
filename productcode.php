<?php
session_start();
include('config/dbcon.php');


// FOR ADDING PRODUCT

if(isset($_POST['product_save'])){
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offer_price = $_POST['offer_price'];
    $tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    $image = $_FILES['image']['name'];
 
    $allowed_extensions = array('jpg','png','jpeg');
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time(). '.' . $image_extension;

    if(!in_array($image_extension, $allowed_extensions)){

        $_SESSION['status'] = "Image should be in jpg, png or jpeg format!";
        header('location:product-add.php');
        exit(0);
    }else{
        try { 
        $productquery = "INSERT INTO product(category_id, name, small_description, long_description, price, offerprice, tax, quantity, status,image) VALUES ('$category_id', '$name','$small_description','$long_description','$price','$offer_price','$tax','$quantity','$status','$filename')";
                    
        $result = mysqli_query($conn,$productquery);
        } catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
        } 
            
        if($result){
            
            move_uploaded_file($_FILES['image']['tmp_name'],'uploads/product/'.$filename);

            $_SESSION['status'] = "Added Successfully";
            header('location:products.php');
        }else{
            $_SESSION['status'] = "Addition failed";
            header('location:products.php');
            // mysqli_error($conn);
        }
    }
}

// FOR UPDATING PRODUCT

if(isset($_POST['product_update'])){
    
    $id = $_POST['id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offer_price'];
    $tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($image != ''){

        $update_filename = $_FILES['image']['name'];

        $allowed_extensions = array('jpg','png','jpeg');
        $image_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
        $filename = time(). '.' . $image_extension;

        if(!in_array($image_extension, $allowed_extensions)){
    
            $_SESSION['status'] = "Image should be in jpg, png or jpeg format!";
            header('location:products.php');
            exit(0);
        }
        $update_filename = $filename;

    }else{

    $update_filename = $old_image;
    }
        
    
    $productquery = "UPDATE product SET category_id='$category_id', 
                        name='$name', 
                        small_description='$small_description', long_description='$long_description', 
                        price='$price', 
                        offerprice='$offerprice', 
                        tax='$tax', 
                        quantity='$quantity', 
                        status='$status', 
                        image='$update_filename' 
                    WHERE id='$id'";            
        
    $result = mysqli_query($conn,$productquery);

    
    if($result){
        if($image != ''){

            move_uploaded_file($_FILES['image']['tmp_name'],'uploads/product/'.$filename);
            
            unlink("uploads/product/".$old_image);
            
        }
        $_SESSION['status'] = "Updated Successfully";
        header('location:products.php');
    }else{
        $_SESSION['status'] = "Updation failed";
        header('location:products.php');
        // mysqli_error($conn);
    }
    
}


//FOR DELETING PRODUCT

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $image = $_GET['image'];

    $sql = "DELETE FROM product where id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        unlink("uploads/product/".$image);
        $_SESSION['status'] = "Deleted Successfully";
        header('location:products.php');
    }else{
        $_SESSION['status'] = "Deletion failed";
        header('location:products.php');
        // mysqli_error($conn);
    }
}

