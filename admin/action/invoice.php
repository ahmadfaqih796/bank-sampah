<?php
require('../../config/function.php');
if (isset($_POST['saveInvoice'])) {
   $id_transaksi = validate($_POST['transaksi_id']);
   $id_user = validate($_POST['user_id']);
   $produk = validate($_POST['produk']);
   $volume = validate($_POST['volume']);
   $array = explode('&', $produk);
   $p_id = $array[0];
   $p_harga = $array[1];
   $total = $p_harga * $volume;
   $base_url = '/admin/timbangan_create.php?nasabah=' . $id_user . '&id_transaksi=' . $id_transaksi;
   if ($produk != '') {
      $query = "INSERT INTO timbangan (id_transaksi, user_id, product_id, volume, total) VALUES ('$id_transaksi', '$id_user', '$p_id', '$volume', '$total')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect($base_url, 'Berhasil Menyimpan Data');
      } else {
         redirect($base_url, 'Gagal Menyimpan Data');
      }
   } else {
      redirect($base_url, 'Data Tidak Lengkap');
   }
}
