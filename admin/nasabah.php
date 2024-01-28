<?php
$pageTitle = 'users';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>Nasabah Lists
               <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNasabah">Tambah Nasabah</button>
            </h4>
         </div>
         <div class="card-body">
            <?= alertMessage() ?>
            <div class="table-responsive">
               <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Alamat</th>
                        <th>Jml Warga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $nasabah = getNasabahAll();
                     if (mysqli_num_rows($nasabah) > 0) {
                        foreach ($nasabah as $item) {
                     ?>
                           <tr>
                              <td><?= $item['id'] ?></td>
                              <td><?= $item['fullname'] ?></td>
                              <td><?= $item['rt'] ?></td>
                              <td><?= $item['rw'] ?></td>
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['jml_warga'] ?></td>
                              <td><?= $item['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                              <td><?= $item['created_at'] ?></td>
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
<?php include('modal/nasabah/create.php'); ?>
<!-- <?php include('modal/nasabah/edit.php'); ?>
<?php include('modal/nasabah/delete.php'); ?> -->

<?php include('includes/footer.php'); ?>