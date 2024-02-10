<?php
$pageTitle = 'Penimbangan';
include('includes/header.php');
$tanggal = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
$session_id = $_SESSION['auth_user']['id'];
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
   $timbangan = getTransaksiTimbanganByDateAndUserId($session_id, $_GET['tanggal']);
} else {
   $timbangan = getTransaksiTimbanganById($session_id);
}
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Penimbangan</h4>
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
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNasabah" onclick="getTransaksiId(<?= mysqli_num_rows($timbangan) + 1 ?>)">Tambah</button>
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>No Rekening</th>
                        <th>Alamat</th>
                        <th>Total barang</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (mysqli_num_rows($timbangan) > 0) {
                        foreach ($timbangan as $item) {
                     ?>
                           <tr>
                              <td><?= $item['id_transaksi'] ?></td>
                              <td><?= $item['name'] ?></td>
                              <td><?= $item['no_rekening'] ?></td>
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['total_barang'] ?></td>
                              <td><?= $item['total_harga'] ?></td>
                              <td><?= $item['is_paid'] ? "Berhasil" : "Belum Ditarik" ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <td>
                                 <a class="btn btn-warning m-2" href="print/timbangan.php?get=detail&transaksi_id=<?= $item['id_transaksi'] ?>&user_id=<?= $item['user_id'] ?>" target="_blank">Cetak</a>
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

<?php include('includes/footer.php'); ?>