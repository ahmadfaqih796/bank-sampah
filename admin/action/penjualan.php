<?php
require('../../config/function.php');
if (isset($_POST['savePenjualan'])) {
   $tgl_penjualan = validate($_POST['tgl_penjualan']);
   $setoran = validate($_POST['setoran']);

   if ($tgl_penjualan != '') {
      $query = "INSERT INTO penjualan (tgl_penjualan, setoran) VALUES ('$tgl_penjualan', '$setoran')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/penjualan.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/penjualan.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/penjualan.php', 'Data Tidak Lengkap');
   }
}
