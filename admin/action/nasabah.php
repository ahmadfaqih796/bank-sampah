<?php
require('../../config/function.php');
if (isset($_POST['saveNasabah'])) {
   $nasabah = validate($_POST['nasabah']);
   $alamat = validate($_POST['alamat']);
   $rt = validate($_POST['rt']);
   $rw = validate($_POST['rw']);
   $jml_warga = validate($_POST['jml_warga']);
   // $dateNow = dateNow();

   if ($nasabah != '') {
      $query = "INSERT INTO nasabah (user_id, alamat, rt, rw, jml_warga) VALUES ('$nasabah', '$alamat', '$rt', '$rw', '$jml_warga')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/nasabah.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/nasabah.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/nasabah.php', 'Data Tidak Lengkap');
   }
}
