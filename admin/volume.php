<?php
$pageTitle = 'Setoran Penjualan';
include('includes/header.php');
$tanggal = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
   $data = getVolumeReportByDate($_GET['tanggal']);
} else {
   $data = getVolumeReport();
}
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Volume Sampah</h4>
               </div>
               <div class="col-md-7">
                  <form action="" method="get">
                     <div class="row">
                        <div class="col-md-5 mb-3">
                           <input type="month" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
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
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <!-- <th>No</th> -->
                        <th>Nama Produk</th>
                        <th>Total Volume Sampah</th>
                        <th>Rupiah</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     $total_volume = 0;
                     $total_harga = 0;
                     if (mysqli_num_rows($data) > 0) {
                        foreach ($data as $item) {
                           $total_volume += $item['t_volume'];
                           $total_harga += $item['t_rupiah'];
                     ?>
                           <tr>
                              <!-- <td><?= $no++ ?></td> -->
                              <td><?= $item['name'] ?></td>
                              <td><?= ($item['t_volume'] == null ? 0 : $item['t_volume']) ?></td>
                              <td><?= ($item['t_rupiah'] == null ? 0 : $item['t_rupiah']) ?></td>
                           </tr>
                     <?php
                        }
                     }
                     ?>
                     <tr>
                        <th>Total</th>
                        <th><?= $total_volume ?></th>
                        <th><?= $total_harga ?></th>

                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>