<?php
$pageTitle = 'Keuangan';
include('includes/header.php');
$date = isset($_GET['tanggal']) == true ? $_GET['tanggal'] : '';
?>

<div class="row">
   <?php alertMessage() ?>
   <div class="col-xl-12 col-sm-12 mb-4">
      <div class="card">
         <div class="card-header">
            <form action="" method="get">
               <div class="row">
                  <div class="col-md-5">
                     <h4>Keuangan</h4>
                  </div>
                  <div class="col-md-2">
                     <select name="choose_date" id="choose_date" class="form-control">
                        <option value="day">Perhari</option>
                        <option value="month">Perbulan</option>
                        <option value="year">Pertahun</option>
                     </select>
                  </div>
                  <div class="col-md-2" id="date_input_container">
                     <!-- Input tanggal akan ditambahkan melalui JavaScript -->
                  </div>
                  <!-- <div class="col-md-3">
                     <input type="date" name="tanggal" id="inputDate" class="form-control" value="<?= isset($_GET['tanggal']) == true ? $_GET['tanggal'] : ''  ?>" required>
                  </div> -->
                  <div class="col-md-3">
                     <button type="submit" class="btn btn-primary">Filter</button>
                     <a href="keuangan.php" class="btn btn-danger">Reset</a>
                     <a href="print/keuangan.php?get=all&tanggal=<?= $date ?>" class="btn btn-success float-end" target="_blank">Cetak</a>
                  </div>
               </div>
            </form>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>Tanggal</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Saldo bank sampah</th>
                        <th>Nilai beli sampah</th>
                        <th>Keuntungan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $t_h_jual = 0;
                     $t_h_beli = 0;
                     $t_keuntungan = 0;
                     if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
                        $report = getReportKeuanganByDate($_GET['tanggal']);
                     } else {
                        $report = getReportKeuangan();
                     }
                     if (mysqli_num_rows($report) > 0) {
                        foreach ($report as $item) {
                           $t_h_jual += $item['saldo_bank'];
                           $t_h_beli += $item['p_saldo'];
                           $t_keuntungan += $item['p_keuntungan'];
                     ?>
                           <tr>
                              <td><?= $item['created_at'] ?></td>
                              <td><?= $item['nik'] ?></td>
                              <td><?= $item['fullname'] ?></td>
                              <td><?= $item['saldo_bank'] ? $item['saldo_bank'] : 0 ?></td>
                              <td><?= $item['p_saldo'] ? $item['p_saldo'] : 0 ?></td>
                              <td><?= $item['p_keuntungan'] ? $item['p_keuntungan'] : 0 ?></td>
                           </tr>
                     <?php
                        }
                     }
                     ?>
                     <tr>
                        <th colspan="3">Total</th>
                        <th><?= $t_h_jual ?></th>
                        <th><?= $t_h_beli ?></th>
                        <th><?= $t_keuntungan ?></th>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include('includes/footer.php'); ?>

<script>
   // Mendefinisikan fungsi untuk membuat input tanggal
   function createDatePickerInput() {
      var dateInput = document.createElement('input');
      dateInput.setAttribute('class', 'form-control');
      dateInput.setAttribute('type', 'date');
      dateInput.setAttribute('required', 'true');
      dateInput.setAttribute('name', 'tanggal');
      return dateInput;
   }

   // Memanggil fungsi untuk membuat input tanggal secara default saat halaman dimuat
   document.getElementById('date_input_container').appendChild(createDatePickerInput());

   // Mendengarkan perubahan pada elemen select
   document.getElementById('choose_date').addEventListener('change', function() {
      // Mendapatkan nilai opsi yang dipilih
      var selectedOption = this.value;

      // Menghapus input tanggal yang ada di dalam kontainer
      document.getElementById('date_input_container').innerHTML = '';

      // Membuat elemen input sesuai dengan opsi yang dipilih
      var dateInput;
      if (selectedOption === 'day') {
         dateInput = createDatePickerInput();
      } else if (selectedOption === 'month') {
         dateInput = document.createElement('input');
         dateInput.setAttribute('class', 'form-control');
         dateInput.setAttribute('type', 'month');
         dateInput.setAttribute('required', 'true');
         dateInput.setAttribute('name', 'tanggal');
      } else if (selectedOption === 'year') {
         dateInput = document.createElement('input');
         dateInput.setAttribute('class', 'form-control');
         dateInput.setAttribute('type', 'number');
         dateInput.setAttribute('placeholder', 'Tahun');
         dateInput.setAttribute('required', 'true');
         dateInput.setAttribute('name', 'tanggal');
      }

      // Menambahkan input tanggal ke dalam kontainer
      document.getElementById('date_input_container').appendChild(dateInput);
   });
</script>