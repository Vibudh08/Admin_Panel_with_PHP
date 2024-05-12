<?php
session_start();
include('includes/header.php');
if(isset($_SESSION['auth'])){
    $_SESSION['status'] = "You are already logged in";
    header('location:index.php');
    exit();
}
?>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h3>Login Form</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            include('messages/message.php');
                        ?>
                        <form action="logincode.php" method="POST">
                            <div class="form-group">
                                <label for="">Email Id</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                            <div class="input-group mb-3">
                                <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required />
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
                            <hr>
                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



