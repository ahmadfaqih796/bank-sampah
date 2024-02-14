<?php
$pageTitle = 'Penarikan Tabungan';
include('includes/header.php');
$invoice = getPenarikanSaldo();
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-12">
                  <h4>Penarikan Tabungan</h4>
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
                        <!-- <th>No Rekening</th> -->
                        <th>Alamat</th>
                        <th>Total Saldo</th>
                        <th>Total Penarikan</th>
                        <th>Sisa Saldo</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     if (mysqli_num_rows($invoice) > 0) {
                        foreach ($invoice as $item) {
                     ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $item['name'] ?></td>
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['t_saldo'] ?></td>
                              <td><?= $item['t_penarikan'] ?></td>
                              <td><?= $item['t_sisa_saldo'] ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <td>
                                 <a class="btn btn-warning m-2" href="print/penarikan.php?get=detail&id=<?= $item['id'] ?>" target="_blank">Cetak</a>
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