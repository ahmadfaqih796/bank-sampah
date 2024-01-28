<?php
require('../config/function.php');

if (isset($_POST['loginBtn'])) {
   $emailInput = validate($_POST['email']);
   $passwordInput = validate($_POST['password']);

   $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
   $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

   if ($email != '' && $password != '') {
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
      $result = mysqli_query($conn, $query);
      if ($result) {
         if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['auth'] = true;
            $_SESSION['auth_role'] = $row['role'];
            $_SESSION['auth_user'] = [
               'name' => $row['name'],
               'email' => $row['email'],
               'phone' => $row['phone'],
            ];
            if ($row['role'] == "admin") {
               redirect('/admin/index.php', 'Login Berhasil sebagai admin');
            } elseif ($row['role'] == "user") {
               redirect('/user/index.php', 'Login Berhasil sebagai user');
            } else {
               redirect('/index.php', 'Login Berhasil');
            }
         } else {
            redirect("/login.php", "Email dan Password Salah");
         }
      } else {
         redirect("/login.php", "Email dan Password Tidak Ditemukan");
      }
   } else {
      redirect("/login.php", "Email dan Password Tidak Boleh Kosong");
   }
}
