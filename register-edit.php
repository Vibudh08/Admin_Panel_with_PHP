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
              <li class="breadcrumb-item active">Edit Registered Users</li>
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
                            <h3 class="card-title">Edit Registered Users</h3>
                            <a href="register.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 ">
                                <form action="code.php" method="post">
                                    <div class="modal-body">

                                        <?php
                                        
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            
                                            $sql = "SELECT * FROM user where id= '$id'";
                                            $result = mysqli_query($conn,$sql);
                                            
                                            $row = $result->fetch_assoc();
                                            // echo $id;
                                        }
                                        
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Id</label>
                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="number" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role_as" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>

                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="submit" name="updateUser" class="btn btn-info">Update</button>
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