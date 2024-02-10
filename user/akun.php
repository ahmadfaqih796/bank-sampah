<?php
$pageTitle = 'Akun';
include('includes/header.php');
$session_id = $_SESSION['auth_user']['id'];
$data = getNasabahById($session_id);
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-12">
                  <h4>Akun</h4>
               </div>
            </div>
         </div>
         <div class="card-body">
            <?= alertMessage() ?>
            <form action="action/user.php" method="post">
               <input hidden type="text" name="user_id" id="user_id" value="<?= $data['user_id'] ?>" class="form-control">
               <div class="mb-3">
                  <label for="name">Nama</label>
                  <input disabled type="text" name="name" id="name" value="<?= $data['fullname'] ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="no_rekening">No Rekening</label>
                  <input disabled type="text" name="no_rekening" id="no_rekening" value="<?= $data['no_rekening'] ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="rt">RT</label>
                  <input type="text" name="rt" id="rt" value="<?= $data['rt'] ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="rw">RW</label>
                  <input type="text" name="rw" id="rw" value="<?= $data['rw'] ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" value="<?= $data['alamat'] ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="jml_warga">Jumlah Warga</label>
                  <input type="text" name="jml_warga" id="jml_warga" value="<?= $data['jml_warga'] ?>" class="form-control">
               </div>
               <button type="submit" class="btn bg-gradient-primary float-end" name="simpanAkun">Simpan</button>
            </form>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>