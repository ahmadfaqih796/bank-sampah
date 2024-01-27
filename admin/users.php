<?php include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>User Lists
               <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUser">Tambah User</button>
            </h4>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<?php include('modal/user/create.php'); ?>

<?php include('includes/footer.php'); ?>