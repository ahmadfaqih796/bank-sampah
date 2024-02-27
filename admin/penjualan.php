<?php
$pageTitle = 'Setoran Penjualan';
include('includes/header.php');
$tanggal = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
   $timbangan = getTransaksiTimbanganByDate($_GET['tanggal']);
} else {
   $timbangan = getTransaksiTimbangan();
}
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Hasli Penjualan ke Pengepul</h4>
               </div>
               <div class="col-md-7">
                  <form action="" method="get">
                     <div class="row">
                        <div class="col-md-5 mb-3">
                           <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
                        </div>
                        <div class="col-md-7">
                           <button class="btn btn-primary">Filter</button>
                           <a href="transaksi.php" class="btn btn-danger">Reset</a>
                           <a class="btn btn-success float-end" href="print/transaksi.php?get=invoice&tanggal=<?= $tanggal ?>">Cetak</a>
                        </div>
                     </div>
                  </form>
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
                        <th>Jenis Sampah</th>
                        <th>Volume Sampah</th>
                        <th>Nama Petugas</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     if (mysqli_num_rows($timbangan) > 0) {
                        foreach ($timbangan as $item) {
                     ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <!-- <td><?= $item['no_rekening'] ?></td> -->
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['total_barang'] ?></td>
                              <td><?= $item['total_harga'] ?></td>
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

<?php include('includes/footer.php'); ?>