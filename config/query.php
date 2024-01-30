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

function getNasabahAll()
{
   global $conn;
   $query = "SELECT n.id, n.user_id, n.no_rekening, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getTimbanganAll()
{
   global $conn;
   $query = "SELECT t.id,id_transaksi ,u.`name`,n.no_rekening, n.alamat, n.rt, n.rw, p.`name` AS n_barang, p.h_jual, volume,total, t.created_at FROM timbangan t LEFT JOIN users u ON t.user_id = u.id LEFT JOIN product p ON t.product_id = p.id LEFT JOIN nasabah n ON t.user_id = n.user_id";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getFilterNasabah($date)
{
   global $conn;
   $query = "SELECT n.id, n.user_id, n.no_rekening, u.name AS fullname, u.email, u.phone, u.is_active, u.role, n.alamat, n.rt, n.rw, n.jml_warga, n.created_at FROM nasabah n LEFT JOIN users u ON n.user_id = u.id WHERE u.role = 'user' AND n.created_at LIKE '%$date%'";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getUsersByRole($data)
{
   global $conn;
   $role = validate($data);
   $query = "SELECT * FROM users WHERE role = '$role'";
   $result = mysqli_query($conn, $query);
   return $result;
}
