<?php
require('../../config/function.php');
require('../../config/query.php');
if (isset($_POST['saveInvoice'])) {
   $id_transaksi = validate($_POST['transaksi_id']);
   $id_user = validate($_POST['user_id']);
   $m_penarikan = validate($_POST['m_penarikan']);
   $t_barang = validate($_POST['t_barang']);
   $t_harga = validate($_POST['t_harga']);
   $t_harga_jual = validate($_POST['t_harga_jual']);
   $t_harga_beli = validate($_POST['t_harga_beli']);
   $is_paid = 1;

   if (isset($_GET['paid']) && $_GET['paid'] != '') {
      $q_paid = '&paid=1';
   } else {
      $q_paid = '&paid=1';
   }
   $base_url = '/admin/timbangan_create.php?nasabah=' . $id_user . '&id_transaksi=' . $id_transaksi . $q_paid;
   $base_url_timbangan = '/admin/transaksi.php';
   if ($m_penarikan == "tunai") {
      $query = "INSERT INTO transaksi (transaksi_id, user_id, m_penarikan, t_barang, t_harga, t_harga_beli, is_paid) VALUES ('$id_transaksi', '$id_user', '$m_penarikan', '$t_barang', '$t_harga_jual', '$t_harga_beli', '$is_paid')";
      $result = mysqli_query($conn, $query);
      redirect($base_url_timbangan, 'Berhasil Melakukan Penarikan lewat Tunai');
   } else if ($m_penarikan == "saldo") {
      $nasabah = getNasabahById($id_user);
      $saldo = $nasabah['saldo'];
      $sisa_saldo = $saldo + $t_harga_beli;
      $query_invoice = "INSERT INTO transaksi (transaksi_id, user_id, m_penarikan, t_barang, t_harga, t_harga_beli, is_paid) VALUES ('$id_transaksi', '$id_user', '$m_penarikan', '$t_barang', '$t_harga_jual', '$t_harga_beli', '$is_paid')";
      $query_nasabah = "UPDATE nasabah SET saldo = '$sisa_saldo' WHERE user_id = '$id_user'";
      mysqli_query($conn, $query_invoice);
      mysqli_query($conn, $query_nasabah);
      redirect($base_url_timbangan, 'Berhasil Melakukan Penarikan lewat Saldo');
   } else {
      redirect($base_url, 'Metode Pembayaran Tidak Tersedia');
   }
}
