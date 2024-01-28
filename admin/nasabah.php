<?php
$pageTitle = 'nasabah';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Nasabah Lists</h4>
               </div>
               <div class="col-md-5">
                  <form action="" method="get">
                     <div class="row">
                        <div class="col-md-5 mb-3">
                           <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
                        </div>
                        <div class="col-md-7">
                           <button class="btn btn-primary">Filter</button>
                           <a href="nasabah.php" class="btn btn-danger">Reset</a>
                           <button class="btn btn-success float-end" onclick="printTable()">Cetak</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-2">
                  <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNasabah">Tambah Nasabah</button>
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
                        <th>RT</th>
                        <th>RW</th>
                        <th>Alamat</th>
                        <th>Jml Warga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th class="print_view">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
                        $nasabah = getFilterNasabah($_GET['tanggal']);
                     } else {
                        $nasabah = getNasabahAll();
                     }
                     if (mysqli_num_rows($nasabah) > 0) {
                        foreach ($nasabah as $item) {
                     ?>
                           <tr>
                              <td><?= $item['id'] ?></td>
                              <td><?= $item['fullname'] ?></td>
                              <td><?= $item['no_rekening'] ?></td>
                              <td><?= $item['rt'] ?></td>
                              <td><?= $item['rw'] ?></td>
                              <td><?= $item['alamat'] ?></td>
                              <td><?= $item['jml_warga'] ?></td>
                              <td><?= $item['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                              <td><?= $item['created_at'] ?></td>
                              <td class="print_view">
                                 <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editNasabah" onclick="getNasabahData(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteNasabah" onclick="getNasabahId(<?= $item['id'] ?>)">Hapus</button>
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
<?php include('modal/nasabah/create.php'); ?>
<?php include('modal/nasabah/edit.php'); ?>
<?php include('modal/nasabah/delete.php'); ?>

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
      printWindow.document.write('<h2>Nasabah Lists</h2>');
      printWindow.document.write(document.getElementById('myTable').outerHTML);
      printWindow.document.write('</body></html>');

      printWindow.document.close();

      printWindow.print();
   }
</script>