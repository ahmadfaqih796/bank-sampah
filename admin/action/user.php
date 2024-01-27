<?php
require('../../config/function.php');
if (isset($_POST['saveUser'])) {
   $name = validate($_POST['name']);
   $phone = validate($_POST['phone']);
   $email = validate($_POST['email']);
   $password = validate($_POST['password']);
   $role = validate($_POST['role']);
   // $is_active = validate($_POST['is_active']) == true ? 1 : 0;

   $old_date = date('l, F d y h:i:s');              // returns Saturday, January 30 10 02:06:34
   $old_date_timestamp = strtotime($old_date);
   $new_date = date('Y-m-d H:i:s', $old_date_timestamp);

   if ($name != ''  && $email != '' && $password != '') {
      $query = "INSERT INTO users (name, phone, email, password, role, is_active, created_at) VALUES ('$name', '$phone', '$email', '$password', '$role', '1', '$new_date')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/users.php', 'Data Berhasil');
      } else {
         redirect('/admin/users.php', 'Data Tidak Beres');
      }
   } else {
      redirect('/admin/users.php', 'Data Tidak Lengkap');
   }
}
