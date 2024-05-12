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
                            Gift Products - Add
                            <a href="products.php" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="productcode.php" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        $query = "SELECT *  FROM categories";
                                        $result = mysqli_query($conn,$query);
                                    ?>
                                        <label for="">Select Category</label>
                                            <select name="category_id" class="form-control">
                                                <option value="">Select Category</option>

                                            <?php foreach($result as $item){ ?>

                                                <option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                                                
                                            <?php } ?>

                                        </select><br>
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Small Description</label>
                                        <textarea name="small_description" class="form-control" rows="3" placeholder="Enter Small Description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Long Description</label>
                                        <textarea name="long_description" class="form-control" rows="3" placeholder="Enter Long Description" required></textarea>                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" required placeholder="Enter Price">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Offer Price</label>
                                        <input type="text" name="offer_price" class="form-control" required placeholder="Enter Offer Price">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tax</label>
                                        <input type="text" name="tax" class="form-control" required placeholder="Enter TAX">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" required placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Status (checked = Show | Hide)</label>
                                        <input type="checkbox" name="status"> Show / Hide
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Upload Image</label>
                                        <input type="file" name="image" class="form-control"  >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Click to Save</label><br>
                                        <button type="submit" name="product_save" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </class>
        </class>
    </class>
</section>

</div>

<?php
include('includes/footer.php');
?>