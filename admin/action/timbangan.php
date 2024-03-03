<?php
require('../../config/function.php');
require('../../config/query.php');
if (isset($_POST['saveData'])) {
   $id_transaksi = validate($_POST['transaksi_id']);
   $id_user = validate($_POST['user_id']);
   $produk = validate($_POST['produk']);
   $volume = validate($_POST['volume']);
   $array = explode('&', $produk);
   $p_id = $array[0];
   $p_harga_jual = $array[1];
   $p_harga_beli = $array[2];
   $total = $p_harga_jual * $volume;
   $t_harga_beli = $p_harga_beli * $volume;
   $base_url = '/admin/timbangan_create.php?nasabah=' . $id_user . '&id_transaksi=' . $id_transaksi;
   if ($produk != '') {
      $nasabah = getNasabahById($id_user);
      $saldo = $nasabah['saldo'];
      $sisa_saldo = $saldo + $t_harga_beli;

      $query = "INSERT INTO timbangan (id_transaksi, user_id, product_id, volume, total, t_harga_beli) VALUES ('$id_transaksi', '$id_user', '$p_id', '$volume', '$total', '$t_harga_beli')";
      $query_nasabah = "UPDATE nasabah SET saldo = '$sisa_saldo' WHERE user_id = '$id_user'";
      mysqli_query($conn, $query_nasabah);
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

if (isset($_POST['deleteData'])) {
   $id = validate($_POST['transaksi_id']);
   $user_id = validate($_POST['user_id']);
   $total_harga = validate($_POST['total_harga']);

   $nasabah = getNasabahById($user_id);
   $saldo = $nasabah['saldo'];

   $sisa_saldo = $saldo - $total_harga;


   if ($id != '') {
      $query = "DELETE FROM timbangan WHERE id_transaksi = '$id'";
      $result = mysqli_query($conn, $query);

      $query_nasabah = "UPDATE nasabah SET saldo = '$sisa_saldo' WHERE user_id = '$user_id'";
      mysqli_query($conn, $query_nasabah);
      if ($result) {
         redirect('/admin/timbangan.php', 'Berhasil Menghapus Data');
      } else {
         redirect('/admin/timbangan.php', 'Gagal Menghapus Data');
      }
   } else {
      redirect('/admin/timbangan.php', 'Id ini tidak ditemukan');
   }
}
