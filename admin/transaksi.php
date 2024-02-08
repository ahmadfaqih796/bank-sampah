<?php
$pageTitle = 'Transaksi';
include('includes/header.php');
$tanggal = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
   $invoice = getFilterInvoice($_GET['tanggal']);
} else {
   $invoice = getInvoice();
}
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Transaksi</h4>
               </div>
               <div class="col-md-5">
                  <form action="" method="get">
                     <div class="row">
                        <div class="col-md-5 mb-3">
                           <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
                        </div>
                        <div class="col-md-7">
                           <button class="btn btn-primary">Filter</button>
                           <a href="invoice.php" class="btn btn-danger">Reset</a>
                           <a class="btn btn-success float-end" href="print/invoice.php?get=invoice&tanggal=<?= $tanggal ?>">Cetak</a>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-2">
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNasabah" onclick="getTransaksiId(<?= mysqli_num_rows($invoice) + 1 ?>)">Tambah</button>
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
                        <th>Nama</th>
                        <th>No Rekening</th>
                        <th>Alamat</th>
                        <th>Total barang</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th class="print_view">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (mysqli_num_rows($invoice) > 0) {
                        foreach ($invoice as $item) {
                     ?>
                           <tr>
                              <td><?= $item['id'] ?></td>
                              <td><?= $item['name'] ?></td>
                              <td><?= $item['no_rekening'] ?></td>
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['t_barang'] ?></td>
                              <td><?= $item['t_harga'] ?></td>
                              <td><?= $item['is_paid'] ? "Lunas" : "Belum Bayar" ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <td>
                                 <a class="btn btn-warning m-2" href="print/invoice.php?get=detail&transaksi_id=<?= $item['transaksi_id'] ?>&user_id=<?= $item['user_id'] ?>" target="_blank">Cetak</a>
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