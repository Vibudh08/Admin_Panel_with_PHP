<?php
include('authenticate.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Gift Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container">
            <div class="row">
                <?php
                     include('messages/message.php');
                        ?>   
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Gift Category</h3>
                            <a href="category.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 ">
                                <form action="categorycode.php" method="post">
                                    <div class="modal-body">

                                        <?php
                                        
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            
                                            $sql = "SELECT * FROM categories where id= '$id'";
                                            $result = mysqli_query($conn,$sql);
                                            
                                            $row = $result->fetch_assoc();
                                            // echo $id;
                                        }
                                        
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <div class="form-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" rows="3" class="form-control"><?php echo $row['description'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" <?php echo $row['trending'] == '1' ? 'checked' : '' ?>/> Trending
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?php echo $row['status'] == '1' ? 'checked' : '' ?>/> Status
                                        </div>

                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="submit" name="updateCategory" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                          </div>
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