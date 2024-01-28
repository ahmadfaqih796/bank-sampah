<?php
require('../../config/function.php');
if (isset($_POST['saveProduk'])) {
   $user_id = validate($_POST['user_id']);
   $name = validate($_POST['name']);
   $h_beli = validate($_POST['h_beli']);
   $h_jual = validate($_POST['h_jual']);

   if ($user_id != '') {
      $query = "INSERT INTO product (user_id, name, h_beli, h_jual) VALUES ('$user_id', '$name', '$h_beli', '$h_jual')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/produk.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/produk.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/produk.php', 'Data Tidak Lengkap');
   }
}
