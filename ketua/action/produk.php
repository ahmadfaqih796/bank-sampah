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

if (isset($_POST['editProduk'])) {
   $id = validate($_POST['id']);
   $user_id = validate($_POST['user_id']);
   $name = validate($_POST['name']);
   $h_beli = validate($_POST['h_beli']);
   $h_jual = validate($_POST['h_jual']);
   if ($user_id != '') {
      $query = "UPDATE product SET user_id = '$user_id', name = '$name', h_beli = '$h_beli', h_jual = '$h_jual' WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/produk.php', 'Berhasil Mengedit Data');
      } else {
         redirect('/admin/produk.php', 'Gagal Mengedit Data');
      }
   } else {
      redirect('/admin/produk.php', 'Data Tidak Lengkap');
   }
}

if (isset($_POST['deleteProduk'])) {
   $id = validate($_POST['id']);
   if ($id != '') {
      $query = "DELETE FROM product WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/produk.php', 'Berhasil Menghapus Data');
      } else {
         redirect('/admin/produk.php', 'Gagal Menghapus Data');
      }
   } else {
      redirect('/admin/produk.php', 'Id ini tidak ditemukan');
   }
}
