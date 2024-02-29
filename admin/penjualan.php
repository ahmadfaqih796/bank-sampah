<?php
$pageTitle = 'Hasil Penjualan ke Pengepul';
include('includes/header.php');
$tanggal = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
   $penjualan = getPenjualanByDate($_GET['tanggal']);
} else {
   $penjualan = getAllPenjualan();
}
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Penjualan ke Pengepul</h4>
               </div>
               <div class="col-md-5">
                  <form action="" method="get">
                     <div class="row">
                        <div class="col-md-5 mb-3">
                           <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
                        </div>
                        <div class="col-md-7">
                           <button class="btn btn-primary">Filter</button>
                           <a href="timbangan.php" class="btn btn-danger">Reset</a>
                           <a class="btn btn-success float-end" href="print/timbangan.php?get=timbangan&tanggal=<?= $tanggal ?>">Cetak</a>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-2">
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addModal" onclick="getTransaksiId(<?= mysqli_num_rows($timbangan) + 1 ?>)">Tambah</button>
                  <!-- <a class="btn btn-primary float-end" href="/admin/timbangan_create.php">Tambah Data</a> -->
               </div>
            </div>
         </div>
         <div class="card-body">
            <?= alertMessage() ?>
            <div class="table-responsive">
               <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Setoran</th>
                        <!-- <th>Jenis Sampah</th>
                        <th>Volume Sampah</th> -->
                        <th>Nama Petugas</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     if (mysqli_num_rows($penjualan) > 0) {
                        foreach ($penjualan as $item) {
                     ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <!-- <td><?= $item['tgl_penjualan'] ?></td> -->
                              <td><?= $item['setoran'] ?></td>
                              <td><?= $_SESSION['auth_user']['name'] ?></td>
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
<?php include('modal/penjualan/create.php'); ?>

<?php include('includes/footer.php'); ?>