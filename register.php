<?php
include('authenticate.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Email Id</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">

                            <label for="">Password</label>
                            <div class="input-group mb-3">
                                <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" />
                                <span  class="input-group-text togglePassword" id="eye" style="cursor: pointer">
                                    <i class="fa fa-eye" style="cursor: pointer"></i>
                                </span>
                                <span  class="input-group-text togglePassword" id="close" style="display: none;cursor: pointer">
                                    <i class="bi bi-eye-slash" ></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label><br>
                            <div class="input-group mb-3">
                                <input class="form-control password" id="c_password" class="block mt-1 w-full" type="password" name="c_password" placeholder="Password" />
                                <span  class="input-group-text togglePassword" id="ceye" style="cursor: pointer">
                                    <i class="fa fa-eye" style="cursor: pointer"></i>
                                </span>
                                <span  class="input-group-text togglePassword" id="cclose" style="display: none;cursor: pointer">
                                    <i class="bi bi-eye-slash" ></i>
                                </span>
                            </div>
                        </div>
                        
                        <script>
                                    data = document.getElementById("eye")
                                    data3 = document.getElementById("ceye")
                                    data2 = document.getElementById("close")
                                    data4 = document.getElementById("cclose")
                                    idpass = document.getElementById("password")
                                    idpass2 = document.getElementById("c_password")
                                    data.addEventListener('click',function(){
                                        idpass.setAttribute('type', 'text');
                                        data.style.display ="none"
                                        data2.style.display = "block"

                                    })
                                    data3.addEventListener('click',function(){
                                        idpass2.setAttribute('type', 'text');
                                        data3.style.display ="none"
                                        data4.style.display = "block"

                                    })
                                    data2.addEventListener('click',function(){
                                        idpass.setAttribute('type', 'password');
                                        data.style.display ="block"
                                        data2.style.display = "none"

                                    })
                                    data4.addEventListener('click',function(){
                                        idpass2.setAttribute('type', 'password');
                                        data3.style.display ="block"
                                        data4.style.display = "none"

                                    })

                                </script>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <!-- <section class="content"> -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
           
                    <?php
                            include('messages/message2.php');
                        ?>  

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registered Users </h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $query = "SELECT * FROM user";
                                        $result = mysqli_query($conn, $query);

                                        foreach($result as $row){
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td>
                                                <?php 
                                                    if($row['role_as']==0){
                                                        echo "User";
                                                    }else{
                                                        echo "Admin";
                                                    }   
                                                ?>
                                            </td>
                                            <td>
                                            <a href='register-edit.php?id=<?php echo $row['id']?>' class="btn btn-info btn-sm">Edit</a>
                                            <a href='code.php?id=<?php echo $row['id'] ?>' class="btn btn-danger btn-sm">Delete</a>
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