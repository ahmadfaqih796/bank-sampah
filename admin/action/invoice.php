<?php
require('../../config/function.php');
require('../../config/query.php');
if (isset($_POST['saveInvoice'])) {
   $id_transaksi = validate($_POST['transaksi_id']);
   $id_user = validate($_POST['user_id']);
   $m_pembayaran = validate($_POST['m_pembayaran']);
   $t_barang = validate($_POST['t_barang']);
   $t_harga = validate($_POST['t_harga']);
   $is_paid = 1;

   $base_url = '/admin/timbangan_create.php?nasabah=' . $id_user . '&id_transaksi=' . $id_transaksi;
   if ($m_pembayaran == "tunai") {
      $bayar = validate($_POST['bayar']);
      $kembalian = $bayar - $t_harga;
      if ($t_harga <= $bayar) {
         $query = "INSERT INTO invoice (transaksi_id, user_id, m_pembayaran, bayar, t_barang, t_harga, is_paid, kembalian) VALUES ('$id_transaksi', '$id_user', '$m_pembayaran', '$bayar', '$t_barang', '$t_harga', '$is_paid', '$kembalian')";
         $result = mysqli_query($conn, $query);
         redirect($base_url, 'Berhasil Melakukan Pembayaran lewat Tunai');
      } else {
         redirect($base_url, 'Bayar Tidak Mencukupi');
      }
   } else if ($m_pembayaran == "saldo") {
      $nasabah = getNasabahById($id_user);
      $saldo = $nasabah['saldo'];
      $bayar = $saldo - $t_harga;
      $kembalian = 0;
      if ($t_harga <= $saldo) {
         $query = "INSERT INTO invoice (transaksi_id, user_id, m_pembayaran, bayar, t_barang, t_harga, is_paid, kembalian) VALUES ('$id_transaksi', '$id_user', '$m_pembayaran', '$bayar', '$t_barang', '$t_harga', '$is_paid', '$kembalian')";
         $result = mysqli_query($conn, $query);
         redirect($base_url, 'Berhasil Melakukan Pembayaran lewat Saldo');
      } else {
         redirect($base_url, 'Saldo Tidak Mencukupi');
      }
   } else {
      redirect($base_url, 'Metode Pembayaran Tidak Tersedia');
   }
}
