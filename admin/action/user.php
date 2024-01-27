<?php
require('../../config/function.php');
if (isset($_POST['saveUser'])) {
   $name = validate($_POST['name']);
   $phone = validate($_POST['phone']);
   $email = validate($_POST['email']);
   $password = validate($_POST['password']);
   $role = validate($_POST['role']);
   $dateNow = dateNow();

   if ($name != ''  && $email != '' && $password != '') {
      $query = "INSERT INTO users (name, phone, email, password, role, is_active, created_at) VALUES ('$name', '$phone', '$email', '$password', '$role', '1', '$dateNow')";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/users.php', 'Berhasil Menyimpan Data');
      } else {
         redirect('/admin/users.php', 'Gagal Menyimpan Data');
      }
   } else {
      redirect('/admin/users.php', 'Data Tidak Lengkap');
   }
}

if (isset($_POST['editUser'])) {
   $id = validate($_POST['id']);
   $name = validate($_POST['name']);
   $phone = validate($_POST['phone']);
   $role = validate($_POST['role']);
   $dateNow = dateNow();
   if ($name != '') {
      $query = "UPDATE users SET name = '$name', phone = '$phone', role = '$role', updated_at = '$dateNow' WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if ($result) {
         redirect('/admin/users.php', 'Berhasil Mengedit Data');
      } else {
         redirect('/admin/users.php', 'Gagal Mengedit Data');
      }
   } else {
      redirect('/admin/users.php', 'Data Tidak Lengkap');
   }
}
