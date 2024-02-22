<?php
$pageTitle = 'dashboard';
include('includes/header.php');
$users = getAll('users');
$produk = getAll('product');
$nasabah = getAll('nasabah');
$transaksi_saldo = getAllByPenarikan('transaksi', 'saldo');
$transaksi_tunai = getAllByPenarikan('transaksi', 'tunai');
$p_tabungan = getAll('penarikan');
$t_users = mysqli_num_rows($users);
$t_nasabah = mysqli_num_rows($nasabah);
$t_produk = mysqli_num_rows($produk);
$t_transaksi = mysqli_num_rows($transaksi_saldo);
$t_p_tabungan = mysqli_num_rows($p_tabungan);
$t_h_jual_saldo = 0;
$t_h_beli_saldo = 0;
$t_h_jual_tunai = 0;
$t_h_beli_tunai = 0;
$total_p_tabungan = 0;
foreach ($transaksi_saldo as $item) {
   $t_h_jual_saldo += $item['t_harga'];
   $t_h_beli_saldo += $item['t_harga_beli'];
}
foreach ($transaksi_tunai as $item) {
   $t_h_jual_tunai += $item['t_harga'];
   $t_h_beli_tunai += $item['t_harga_beli'];
}
foreach ($p_tabungan as $item) {
   $total_p_tabungan += $item['t_penarikan'];
}
?>

<div class="row">
   <?php alertMessage() ?>
   <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">User</p>
                     <h5 class="font-weight-bolder mb-0">
                        <?= $t_users ?>
                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Produk</p>
                     <h5 class="font-weight-bolder mb-0">
                        <?= $t_produk ?>
                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Nasabah</p>
                     <h5 class="font-weight-bolder mb-0">
                        <?= $t_nasabah ?>
                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <h4 class=" mb-3 text-capitalize font-weight-bold">Laporan Penyetoran Tunai</h4>
            <div class="table-responsive">
               <table class="table align-items-center mb-0 table-borderless">
                  <tbody>
                     <tr>
                        <th>Saldo Kas Bank Sampah (Harga Jual)</th>
                        <th><?= $t_h_jual_tunai - $t_h_beli_tunai ?></th>
                     </tr>
                     <tr>
                        <th>Saldo Bank Sampah (Harga Beli)</th>
                        <th><?= $t_h_beli_tunai ?></th>
                     </tr>
                     <!-- <tr>
                        <th>total penarikan tabungan</th>
                        <th><?= $total_p_tabungan ?></th>
                     </tr> -->
                     <tr>
                        <th>Sisa Hasil Usaha</th>
                        <th><?= $t_h_jual_tunai - $t_h_beli_tunai ?></th>
                     </tr>
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <h4 class=" mb-3 text-capitalize font-weight-bold">Laporan Penyetoran Saldo</h4>
            <div class="table-responsive">
               <table class="table align-items-center mb-0 table-borderless">
                  <tbody>
                     <tr>
                        <th>Saldo Kas Bank Sampah (Harga Jual)</th>
                        <th><?= $t_h_jual_saldo - $total_p_tabungan ?></th>
                     </tr>
                     <tr>
                        <th>Saldo Bank Sampah (Harga Beli)</th>
                        <th><?= $t_h_beli_saldo - $total_p_tabungan ?></th>
                     </tr>
                     <tr>
                        <th>total penarikan tabungan</th>
                        <th><?= $total_p_tabungan ?></th>
                     </tr>
                     <tr>
                        <th>Sisa Hasil Usaha</th>
                        <th><?= $t_h_jual_saldo - $t_h_beli_saldo ?></th>
                     </tr>
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include('includes/footer.php'); ?>