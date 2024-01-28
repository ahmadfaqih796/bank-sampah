<?php
require('../../config/function.php');
if (isset($_POST['saveNasabah'])) {
   $user_id = validate($_POST['nasabah']);
   $no_rekening = validate($_POST['no_rekening']);
   $alamat = validate($_POST['alamat']);
   $rt = validate($_POST['rt']);
   $rw = validate($_POST['rw']);
   $jml_warga = validate($_POST['jml_warga']);
   // $dateNow = dateNow();

   if ($user_id != '') {
      $query = "INSERT INTO nasabah (user_id, no_rekening, alamat, rt, rw, jml_warga) VALUES ('$user_id', '$no_rekening', '$alamat', '$rt', '$rw', '$jml_warga')";
      $result = mysqli_query($conn, $query);
      if ($result) {
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
      $query = "UPDATE nasabah SET no_rekening = '$no_rekening', alamat = '$alamat', rt = '$rt', rw = '$rw', jml_warga = '$jml_warga' WHERE id = '$id_nasabah'";
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
