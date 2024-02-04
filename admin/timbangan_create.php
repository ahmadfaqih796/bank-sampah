<?php
$pageTitle = 'Penimbangan';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-9">
                  <h4>Penimbangan</h4>
               </div>
               <div class="col-md-3">
                  <button class="btn btn-success" onclick="printTable()">Cetak</button>
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addData">Tambah Timbangan</button>

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
                           <th>No Rekening</th>
                           <th>Alamat</th>
                           <th>Nama barang</th>
                           <th>Harga</th>
                           <th>Volume</th>
                           <th>Total</th>
                           <!-- <th>Tanggal Dibuat</th> -->
                           <!-- <th class="print_view">Aksi</th> -->
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        $subtotal = 0;
                        if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
                           $timbangan = getFilterNasabah($_GET['tanggal']);
                        } else {
                           $timbangan = getTimbanganById($_GET['nasabah'], $_GET['id_transaksi']);
                        }
                        if (mysqli_num_rows($timbangan) > 0) {
                           foreach ($timbangan as $item) {
                              $subtotal += $item['total'];
                        ?>
                              <tr>
                                 <!-- <td><?= $item['id_transaksi'] ?></td> -->
                                 <td><?= $no++ ?></td>
                                 <td><?= $item['name'] ?></td>
                                 <td><?= $item['no_rekening'] ?></td>
                                 <td><?= $item['alamat'] ?></td>
                                 <td><?= $item['n_barang'] ?></td>
                                 <td><?= $item['h_jual'] ?></td>
                                 <td><?= $item['volume'] ?></td>
                                 <td><?= $item['total'] ?></td>
                                 <!-- <td><?= $item['created_at'] ?></td> -->
                                 <!-- <td class="print_view">
                                 <a class="btn btn-warning btn-sm" href="/admin/form/timbangan/create.php?id=<?= $item['id'] ?>">Lihat</a>
                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteNasabah" onclick="getNasabahId(<?= $item['id'] ?>)">Hapus</button>
                              </td> -->
                              </tr>
                        <?php
                           }
                        }
                        ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th colspan="6"></th>
                           <th class="text-center">Sub Total</th>
                           <th><?= $subtotal ?></th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php include('modal/timbangan/create.php'); ?>

   <script>
      function printTable() {
         var style = '<style>';
         style += 'body { font-size: 12px; }';
         style += 'h2 { text-align: center; }';
         style += '#myTable { width: 100%; border-collapse: collapse; }';
         style += 'table .print_view { display: none; }';
         style += '#myTable th, #myTable td { border: 1px solid #ddd; padding: 8px; text-align: left; }';
         style += '</style>';

         var printWindow = window.open('', '_blank');

         printWindow.document.write('<html><head><title>Cetak Tabel</title>' + style + '</head><body>');
         printWindow.document.write('<h2>Timbangan Lists</h2>');
         printWindow.document.write(document.getElementById('myTable').outerHTML);
         printWindow.document.write('</body></html>');

         printWindow.document.close();

         printWindow.print();
      }
   </script>

   <?php include('includes/footer.php'); ?>