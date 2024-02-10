<?php
require('../../config/function.php');

if (isset($_POST['simpanAkun'])) {
   $user_id = validate($_POST['user_id']);
   $alamat = validate($_POST['alamat']);
   $rt = validate($_POST['rt']);
   $rw = validate($_POST['rw']);
   $jml_warga = validate($_POST['jml_warga']);
   if ($user_id != '') {
      $query = "UPDATE nasabah SET  alamat = '$alamat', rt = '$rt', rw = '$rw', jml_warga = '$jml_warga' WHERE user_id = '$user_id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/user/akun.php', 'Berhasil Mengubah Akun');
      } else {
         redirect('/user/akun.php', 'Gagal Mengubah Akun');
      }
   } else {
      redirect('/user/akun.php', 'Data Tidak Lengkap');
   }
}
