<?php
$pageTitle = 'Penimbangan';
include('includes/header.php');
if (isset($_GET['paid']) && $_GET['paid'] != '') {
   $q_paid = 1;
} else {
   $q_paid = 0;
}
$timbangan = getTimbanganById($_GET['nasabah'], $_GET['id_transaksi']);
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-9">
                  <h4>Penimbangan</h4>
               </div>
               <div class="col-md-3">
                  <div class="d-flex justify-content-end">
                     <?php
                     if (mysqli_num_rows($timbangan) > 0) {
                     ?>
                        <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInvoice">Setor</button> -->
                     <?php
                     }
                     if ($q_paid == 0) {
                     ?>
                        <button class="btn btn-primary" style="margin-left: 50px;" data-bs-toggle="modal" data-bs-target="#addData">Tambah</button>
                     <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?= alertMessage() ?>
               <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <!-- <th>No Rekening</th> -->
                           <th>Alamat</th>
                           <th>Nama barang</th>
                           <th>Harga</th>
                           <th>Volume</th>
                           <th>Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        $subtotal = 0;
                        $total_harga_beli = 0;
                        $total_barang = mysqli_num_rows($timbangan);
                        if (mysqli_num_rows($timbangan) > 0) {
                           foreach ($timbangan as $item) {
                              $subtotal += $item['total'];
                              $total_harga_beli += $item['t_harga_beli'];
                        ?>
                              <tr>
                                 <!-- <td><?= $item['id_transaksi'] ?></td> -->
                                 <td><?= $no++ ?></td>
                                 <td><?= $item['name'] ?></td>
                                 <!-- <td><?= $item['no_rekening'] ?></td> -->
                                 <td><?= $item['alamat'] ?></td>
                                 <td><?= $item['n_barang'] ?></td>
                                 <td><?= $item['h_beli'] ?></td>
                                 <td><?= $item['volume'] ?></td>
                                 <td><?= $item['t_harga_beli'] ?></td>
                              </tr>
                        <?php
                           }
                        }
                        ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th colspan="5"></th>
                           <th class="text-center">Sub Total</th>
                           <th><?= $total_harga_beli ?></th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php include('modal/invoice/create.php'); ?>
   <?php include('modal/timbangan/create.php'); ?>

   <?php include('includes/footer.php'); ?>