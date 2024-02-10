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
   $query = "SELECT n.id, n.user_id, n.no_rekening, n.saldo, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getNasabahById($id)
{
   global $conn;
   $query = "SELECT n.id, n.user_id, n.no_rekening, n.saldo, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user' AND u.id = '$id' LIMIT 1";
   $result = mysqli_query($conn, $query);
   $nasabah = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $nasabah;
}

function getTimbanganAll()
{
   global $conn;
   $query = "SELECT t.id,id_transaksi ,u.`name`,n.no_rekening, n.alamat, n.rt, n.rw, p.`name` AS n_barang, p.h_jual, volume,total, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id";
   $result = mysqli_query($conn, $query);
   return $result;
}
function getTimbanganById($user_id, $transaksi_id)
{
   global $conn;
   $query = "SELECT t.id,id_transaksi, t.user_id, u.`name`,n.no_rekening, n.alamat, n.rt, n.rw, p.`name` AS n_barang, p.h_jual, volume,total, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id WHERE t.user_id = '$user_id' AND t.id_transaksi = '$transaksi_id'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbangan()
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.total) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN invoice i ON t.id_transaksi = i.transaksi_id GROUP BY t.id_transaksi";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksiTimbanganById($id)
{
   global $conn;
   $query = "SELECT t.id, id_transaksi, t.user_id, u.`name`, n.no_rekening, n.alamat, n.rt, n.rw, COUNT(id_transaksi) AS total_barang, SUM(t.total) AS total_harga, i.is_paid, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id LEFT JOIN invoice i ON t.id_transaksi = i.transaksi_id WHERE t.user_id = '$id' GROUP BY t.id_transaksi";
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
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_pembayaran, is_paid, bayar, kembalian, i.created_at FROM invoice i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id WHERE i.created_at LIKE '%$date%' ORDER BY i.id DESC";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTransaksi()
{
   global $conn;
   $query = "SELECT i.id, i.transaksi_id, i.user_id, `name`, no_rekening, saldo, alamat, t_barang, t_harga, m_penarikan, is_paid, i.created_at FROM transaksi i LEFT JOIN users u ON i.user_id = u.id LEFT JOIN nasabah n ON i.user_id = n.user_id ORDER BY i.id DESC";
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

function getPenarikanSaldo()
{
   global $conn;
   $query = "SELECT p.id, p.user_id, `name`, no_rekening, t_saldo, alamat, t_penarikan, t_sisa_saldo, p.created_at FROM penarikan p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN nasabah n ON p.user_id = n.user_id ORDER BY p.id DESC";
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
