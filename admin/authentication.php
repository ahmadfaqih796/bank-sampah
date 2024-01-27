<?php
// require('../config/function.php');
if (isset($_SESSION['auth'])) {
   if (isset($_SESSION['auth_role'])) {
      $role = validate($_SESSION['auth_role']);
      $email = validate($_SESSION['auth_user']['email']);

      $query = "SELECT * FROM users WHERE email = '$email' AND role = '$role' LIMIT 1";
      $result = mysqli_query($conn, $query);

      if ($result) {
         if (mysqli_num_rows($result) == 0) {
            logoutSession();
            redirect('/login.php', 'Anda Tidak Memiliki Akses');
         } else {
            logoutSession();
            redirect('/login.php', 'Silahkan Login Kembali');
         }
      }
   }
   redirect('/admin/index.php', 'Anda Sudah Login');
} else {
   # code...
}
