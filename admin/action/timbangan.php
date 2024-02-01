<?php
require('../../config/function.php');
if (isset($_POST['saveData'])) {
   $produk = validate($_POST['produk']);
   $volume = validate($_POST['volume']);
   $array = explode('&', $produk);
   $p_id = $array[0];
   $p_harga = $array[1];
   if ($produk != '') {
      $query = "INSERT INTO timbangan (name, phone, email, password, role, is_active, created_at) VALUES ('$name', '$phone', '$email', '$password', '$role', '1', '$dateNow')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/users.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/users.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/users.php', 'Data Tidak Lengkap');
   }
}
