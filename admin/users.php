<?php include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>User Lists
               <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUser">Tambah User</button>
            </h4>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>Faqih</td>
                        <td>l6n3n@example.com</td>
                        <td>08123456789</td>
                        <td>
                           <button class="btn btn-warning btn-sm">Edit</button>
                           <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<?php include('modal/user/create.php'); ?>

<?php include('includes/footer.php'); ?>