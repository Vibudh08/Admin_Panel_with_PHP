<?php

if(isset($_SESSION['status'])){
    ?>
  <script>
    setInterval(()=>{
      data = document.getElementById('hide')
      data.style.display="none"
    },1500)
  </script>

<div id="hide" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

    <?php
    unset($_SESSION['status']);
}

?>