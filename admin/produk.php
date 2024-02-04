<?php
$pageTitle = 'Produk';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-9">
                  <h4>Produk Lists</h4>
               </div>
               <div class="col-md-3">
                  <a class="btn btn-success" href="print/product.php?get=all" target="_blank">Cetak</a>
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProduk">Tambah Produk</button>
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
                        <th>Nama</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th class="print_view">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $product = getAll('product');
                     if (mysqli_num_rows($product) > 0) {
                        foreach ($product as $item) {
                     ?>
                           <tr>
                              <td><?= $item['id'] ?></td>
                              <td><?= $item['name'] ?></td>
                              <td><?= $item['h_jual'] ?></td>
                              <td><?= $item['h_beli'] ?></td>
                              <td class="print_view">
                                 <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProduk" onclick="getProductData(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteProduk" onclick="getProductId(<?= $item['id'] ?>)">Hapus</button>
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

<!-- Modal -->
<?php include('modal/produk/create.php'); ?>
<?php include('modal/produk/edit.php'); ?>
<?php include('modal/produk/delete.php'); ?>

<?php include('includes/footer.php'); ?>

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
      printWindow.document.write('<h2>Produk Lists</h2>');
      printWindow.document.write(document.getElementById('myTable').outerHTML);
      printWindow.document.write('</body></html>');

      printWindow.document.close();

      printWindow.print();
   }
</script>