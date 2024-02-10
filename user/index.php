<?php
$pageTitle = 'dashboard';
include('includes/header.php'); ?>
<div class="row">
   <div class="col-md-12 mb-4">
      <div class="card card-body p-3">
         <p class="text-sm mb-0 text-capitalize font-weight-bold">Hallo, <?= $_SESSION['auth_user']['name']; ?></p>
         <h5 class="font-weight-bolder mb-0">
            Selamat Datang di halaman Users
         </h5>
      </div>
   </div>

</div>
<?php include('includes/footer.php'); ?>