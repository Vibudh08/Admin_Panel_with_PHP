  <!-- Main Sidebar Container -->
 
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Collection
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="products.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
            </ul>
          </li>


            <li class="nav-header">Settings</li>
              <li class="nav-item">
                <a href="admin-profile.php" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Admin Profile
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="register.php" class="nav-link ">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Registered User
                  </p>
                </a>
              </li>
              
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <script>
    const  activepage = window.location.pathname;
    const navlinks = document.querySelectorAll('.nav-link');

    navlinks.forEach(navlink=>{
      if(navlink.href.includes(`${activepage}`)){
        navlink.classList.add('active');
      }else{
        navlink.classList.remove('active');

      }
      
    })

  </script>