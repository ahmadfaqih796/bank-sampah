<?php
$pageTitle = 'dashboard';
include('includes/header.php');
$users = getAll('users');
$produk = getAll('product');
$nasabah = getAll('nasabah');
$transaksi = getAll('transaksi');
$p_tabungan = getAll('penarikan');
$t_users = mysqli_num_rows($users);
$t_nasabah = mysqli_num_rows($nasabah);
$t_produk = mysqli_num_rows($produk);
$t_transaksi = mysqli_num_rows($transaksi);
$t_p_tabungan = mysqli_num_rows($p_tabungan);
$subtotal = 0;
$total_harga_beli = 0;
$total_p_tabungan = 0;
foreach ($transaksi as $item) {
   $subtotal += $item['t_harga'];
   $total_harga_beli += $item['t_harga_beli'];
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
</div>
<?php include('includes/footer.php'); ?>