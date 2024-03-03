<?php
require_once("function.php");

function getAll($tableName)
{
   global $conn;
   $table = validate($tableName);
   $query = "SELECT * FROM $table";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getAllByPenarikan($tableName, $penarikan)
{
   global $conn;
   $table = validate($tableName);
   $query = "SELECT * FROM $table WHERE m_penarikan = '$penarikan'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getById($tableName, $id)
{
   global $conn;
   $table = validate($tableName);
   $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
   $result = mysqli_query($conn, $query);
   if ($result) {
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
         $response = [
            'status' => 200,
            'message' => 'Fetched Data',
            'data' => $row
         ];
         return $response;
      } else {
         $response = [
            'status' => 404,
            'message' => 'No record found'
         ];
         return $response;
      }
   } else {
      $response = [
         'status' => 500,
         'message' => 'Something went wrong'
      ];
      return $response;
   }
}

function getUsersByRole($data)
{
   global $conn;
   $role = validate($data);
   $query = "SELECT u.id, u.name, n.alamat FROM users u LEFT JOIN nasabah n ON u.id = n.user_id WHERE role = '$role'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getNasabahAll()
{
   global $conn;
   $query = "SELECT n.id, n.nik, n.user_id, n.no_rekening, n.saldo, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getNasabahById($id)
{
   global $conn;
   $query = "SELECT n.id, n.nik, n.user_id, n.no_rekening, n.saldo, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user' AND u.id = '$id' LIMIT 1";
   $result = mysqli_query($conn, $query);
   $nasabah = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $nasabah;
}

function getTimbanganAll()
{
   global $conn;
   $query = "SELECT t.id,id_transaksi ,u.`name`,n.no_rekening, n.alamat, n.rt, n.rw, p.`name` AS n_barang, p.h_jual, p.h_beli, volume,total, t_harga_beli, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id";
   $result = mysqli_query($conn, $query);
   return $result;
}
function getTimbanganById($user_id, $transaksi_id)
{
   global $conn;
   $query = "SELECT t.id,id_transaksi, t.user_id, u.`name`,n.no_rekening, n.alamat, n.rt, n.rw, p.`name` AS n_barang, p.h_jual, p.h_beli, volume,total, t_harga_beli, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id WHERE t.user_id = '$user_id' AND t.id_transaksi = '$transaksi_id'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getVolumeReport()
{
   global $conn;
   $query = 'SELECT p.*, 
   (SELECT SUM(volume) FROM timbangan WHERE product_id = p.id) AS t_volume,
   (SELECT SUM(total) FROM timbangan WHERE product_id = p.id) AS t_rupiah
   FROM product p';
   $result = mysqli_query($conn, $query);
   return $result;
}

function getVolumeReportByDate($date)
{
   global $conn;
   $query = "SELECT p.*, 
   (SELECT SUM(volume) FROM timbangan WHERE product_id = p.id && created_at LIKE '%$date%') AS t_volume,
   (SELECT SUM(total) FROM timbangan WHERE product_id = p.id && created_at LIKE '%$date%') AS t_rupiah
   FROM product p";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbangan()
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.t_harga_beli) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN transaksi i ON t.id_transaksi = i.transaksi_id GROUP BY t.id_transaksi";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbanganById($id)
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.t_harga_beli) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN transaksi i ON t.id_transaksi = i.transaksi_id WHERE t.user_id = '$id' GROUP BY t.id_transaksi";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbanganByDate($date)
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.total) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN invoice i ON t.id_transaksi = i.transaksi_id WHERE t.created_at LIKE '%$date%' GROUP BY t.id_transaksi";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbanganByDateAndUserId($id, $date)
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.total) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN invoice i ON t.id_transaksi = i.transaksi_id WHERE t.user_id = '$id' AND t.created_at LIKE '%$date%' GROUP BY t.id_transaksi";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getFilterNasabah($date)
{
   global $conn;
   $query = "SELECT n.id, n.user_id, n.no_rekening, n.saldo, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user' AND n.created_at LIKE '%$date%'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getInvoice()
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_pembayaran, is_paid, bayar, kembalian, i.created_at FROM invoice i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getInvoiceById($user_id, $transaksi_id)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_pembayaran, is_paid, bayar, kembalian, i.created_at FROM invoice i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.user_id = '$user_id' AND i.transaksi_id = '$transaksi_id' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $data;
}

function getFilterInvoice($date)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, t_harga_beli, m_pembayaran, is_paid, bayar, kembalian, i.created_at FROM invoice i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.created_at LIKE '%$date%' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksi()
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, t_harga_beli, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiAllById($user_id)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.user_id = '$user_id' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiById($user_id, $transaksi_id)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.user_id = '$user_id' AND i.transaksi_id = '$transaksi_id' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $data;
}

function getFilterTransaksi($date)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.created_at LIKE '%$date%' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getFilterTransaksiById($user_id, $date)
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.user_id = '$user_id' AND i.created_at LIKE '%$date%' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getPenarikanSaldo()
{
   global $conn;
   $query = "SELECT p.id, p.user_id, `name`, no_rekening, t_saldo, alamat, t_penarikan, t_sisa_saldo, p.created_at FROM penarikan p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN nasabah n ON p.user_id = n.user_id ORDER BY p.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}
function getPenarikanSaldoAllById($user_id)
{
   global $conn;
   $query = "SELECT p.id, p.user_id, `name`, no_rekening, t_saldo, alamat, t_penarikan, t_sisa_saldo, p.created_at FROM penarikan p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN nasabah n ON p.user_id = n.user_id WHERE p.user_id = '$user_id' ORDER BY p.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getPenarikanSaldoById($id)
{
   global $conn;
   $query = "SELECT p.id, `name`, no_rekening, alamat, rt, rw, jml_warga, t_saldo, t_penarikan, t_sisa_saldo, p.created_at FROM penarikan p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN nasabah n ON p.user_id = n.user_id WHERE p.id = '$id' ORDER BY p.id DESC";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $data;
}

function getReportKeuangan()
{
   global $conn;
   $query = "SELECT n.user_id, n.nik, u.NAME AS fullname, SUM( t.total ) AS saldo_bank, SUM( t.t_harga_beli ) AS p_saldo, ( SUM( t.total ) - SUM( t.t_harga_beli )) AS p_keuntungan, t.created_at FROM nasabah n LEFT JOIN timbangan t ON n.user_id = t.user_id LEFT JOIN users u ON n.user_id = u.id GROUP BY n.user_id";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getReportKeuanganByDate($date)
{
   global $conn;
   $query = "SELECT n.user_id, n.nik, u.NAME AS fullname, SUM( t.total ) AS saldo_bank, SUM( t.t_harga_beli ) AS p_saldo, ( SUM( t.total ) - SUM( t.t_harga_beli )) AS p_keuntungan, t.created_at FROM nasabah n LEFT JOIN timbangan t ON n.user_id = t.user_id LEFT JOIN users u ON n.user_id = u.id WHERE t.created_at LIKE '%$date%' GROUP BY n.user_id";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getAllPenjualan()
{
   global $conn;
   $query = "SELECT * FROM penjualan";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getPenjualanByDate($date)
{
   global $conn;
   $query = "SELECT * FROM penjualan WHERE created_at LIKE '%$date%'";
   $result = mysqli_query($conn, $query);
   return $result;
}
