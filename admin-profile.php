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
          <div class="col-sm-12">
             <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
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
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM user WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        // print_r($row);

                        ?>   
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin Profile</h3>
                            <a href="register.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 ">
                                <form action="code.php" method="post">
                                    <div class="modal-body">
                                        
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Id</label>
                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="number" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Phone Number" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group mb-3">
                                                <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="password" value="<?php echo $row['password'] ?>" placeholder="Password" readonly/>
                                                <span  class="input-group-text togglePassword" id="eye" style="cursor: pointer">
                                                    <i class="fa fa-eye" style="cursor: pointer"></i>
                                                </span>
                                                <span  class="input-group-text togglePassword" id="close" style="display: none;cursor: pointer">
                                                    <i class="bi bi-eye-slash" ></i>
                                                </span>
                                                <script>
                                                    data = document.getElementById("eye")
                                                    data2 = document.getElementById("close")
                                                    idpass = document.getElementById("password")
                                                    data.addEventListener('click',function(){
                                                        idpass.setAttribute('type', 'text');
                                                        data.style.display ="none"
                                                        data2.style.display = "block"

                                                    })
                                                    data2.addEventListener('click',function(){
                                                        idpass.setAttribute('type', 'password');
                                                        data.style.display ="block"
                                                        data2.style.display = "none"

                                                    })

                                                </script>
                                            </div>
                                        </div>

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