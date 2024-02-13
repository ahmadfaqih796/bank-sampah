<?php
require('../../config/function.php');

if (isset($_POST['saveNasabah'])) {
   $user_id = validate($_POST['nasabah']);
   $no_rekening = validate($_POST['no_rekening']);
   $alamat = validate($_POST['alamat']);
   $rt = validate($_POST['rt']);
   $rw = validate($_POST['rw']);
   $jml_warga = validate($_POST['jml_warga']);

   $query_user = "SELECT * FROM nasabah WHERE user_id = '$user_id' LIMIT 1";
   $cek_user = mysqli_query($conn, $query_user);

   if ($user_id != '') {
      if (mysqli_num_rows($cek_user) > 0) {
         redirect('/admin/nasabah.php', 'Nasabah Sudah Terdaftar');
      } else if (mysqli_num_rows($cek_user) == 0) {
         $query = "INSERT INTO nasabah (user_id, no_rekening, alamat, rt, rw, jml_warga) VALUES ('$user_id', '$no_rekening', '$alamat', '$rt', '$rw', '$jml_warga')";
         $result = mysqli_query($conn, $query);
         redirect('/admin/nasabah.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/nasabah.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/nasabah.php', 'Data Tidak Lengkap');
   }
}


if (isset($_POST['editNasabah'])) {
   $id_nasabah = validate($_POST['id_nasabah']);
   $no_rekening = validate($_POST['no_rekening']);
   $alamat = validate($_POST['alamat']);
   $rt = validate($_POST['rt']);
   $rw = validate($_POST['rw']);
   $jml_warga = validate($_POST['jml_warga']);
   if ($id_nasabah != '' || $no_rekening != '') {
      $query = "UPDATE nasabah SET no_rekening = '$no_rekening', alamat = '$alamat', rt = '$rt', rw = '$rw', jml_warga = '$jml_warga' WHERE user_id = '$id_nasabah'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/nasabah.php', 'Berhasil Mengedit Data');
      } else {
         redirect('/admin/nasabah.php', 'Gagal Mengedit Data');
      }
   } else {
      redirect('/admin/nasabah.php', 'Data Tidak Lengkap');
   }
}

if (isset($_POST['deleteNasabah'])) {
   $id = validate($_POST['id']);
   if ($id != '') {
      $query = "DELETE FROM nasabah WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/nasabah.php', 'Berhasil Menghapus Data');
      } else {
         redirect('/admin/nasabah.php', 'Gagal Menghapus Data');
      }
   } else {
      redirect('/admin/nasabah.php', 'Id ini tidak ditemukan');
   }
}

if (isset($_POST['penarikanSaldoNasabah'])) {
   $user_id = validate($_POST['p_id_nasabah']);
   $t_saldo = validate($_POST['t_saldo']);
   $t_penarikan = validate($_POST['t_penarikan']);
   $s_saldo = $t_saldo - $t_penarikan;
   // print_r($user_id);
   if ($t_saldo > $t_penarikan) {
      $query_saldo = "UPDATE nasabah SET saldo = '$s_saldo' WHERE user_id = '$user_id'";
      $query = "INSERT INTO penarikan (user_id, t_saldo, t_penarikan, t_sisa_saldo) VALUES ('$user_id', '$t_saldo', '$t_penarikan', '$s_saldo')";
      $result_saldo = mysqli_query($conn, $query_saldo);
      $result = mysqli_query($conn, $query);
      if ($result && $result_saldo) {
         redirect('/admin/penarikan.php', 'Berhasil Penarikan Saldo');
      } else {
         redirect('/admin/nasabah.php', 'Gagal Penarikan Saldo');
      }
   } else {
      redirect('/admin/nasabah.php', 'Penarikan Saldo Tidak Boleh Lebih Besar Dari Saldo Anda');
   }
}
