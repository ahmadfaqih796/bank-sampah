<?php
$pageTitle = 'users';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>User Lists
               <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUser">Tambah</button>
            </h4>
         </div>
         <div class="card-body">
            <?= alertMessage() ?>
            <div class="table-responsive">
               <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     $users = getAll('users');
                     if (mysqli_num_rows($users) > 0) {
                        foreach ($users as $item) {
                     ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $item['name'] ?></td>
                              <td><?= $item['email'] ?></td>
                              <td><?= $item['phone'] ?></td>
                              <td><?= $item['role'] ?></td>
                              <td><?= $item['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                              <td>
                                 <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" onclick="getUserData(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="getUserId(<?= $item['id'] ?>)">Hapus</button>
                              </td>
                           </tr>
                     <?php
                        }
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<?php include('modal/user/create.php'); ?>
<?php include('modal/user/edit.php'); ?>
<?php include('modal/user/delete.php'); ?>

<?php include('includes/footer.php'); ?>