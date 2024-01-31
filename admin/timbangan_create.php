<?php
$pageTitle = 'Penimbangan';
include('includes/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h4>Penimbangan</h4>
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
                  <button class="btn btn-primary float-end">Tambah Timbangan</button>
               </div>
            </div>
         </div>
         <div class="card-body">
         </div>
      </div>
   </div>
</div>


<?php include('includes/footer.php'); ?>