<?php
include('authenticate.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config/dbcon.php');

?>


<div class="content-wrapper">

<section class="content mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include('messages/message2.php');
                ?> 
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Gift Products
                            <a href="product-add.php" class="btn btn-primary btn-sm float-right">Add</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Offer Price</th>
                                        <th>Tax</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $productquery = "SELECT * FROM product";
                                        $result = mysqli_query($conn, $productquery);
                                        foreach($result as $row){
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><img src="uploads/product/<?php echo $row['image']?>" width="50px" height="50px" alt=""></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['offerprice'] ?></td>
                                            <td><?php echo $row['tax'] ?></td>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td> <input type="checkbox"
                                                <?php echo $row['status'] == '1' ? 'checked':'' ?> readonly />
                                            </td>
                                            <td>
                                            <a href='product-edit.php?id=<?php echo $row['id'] ?>' class="btn btn-info btn-sm">Edit</a>
                                            <a href='productcode.php?id=<?php echo $row['id']?> &image=<?php echo $row['image']?>' class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>   
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<?php
include('includes/footer.php');
?>