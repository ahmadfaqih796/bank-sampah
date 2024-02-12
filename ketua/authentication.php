<?php
function authentication($auth_role)
{
   global $conn;
   if (isset($_SESSION['auth'])) {
      $role = validate($_SESSION['auth_role']);
      $email = validate($_SESSION['auth_user']['email']);

      $query = "SELECT * FROM users WHERE email = '$email' AND role = '$role' LIMIT 1";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      // if ($result) {
      //    if (mysqli_num_rows($result) == 0) {
      //       logoutSession();
      //       redirect('/login.php', 'Anda Tidak Memiliki Akses');
      //    } else {
      //       if ($row['role'] != 'admin') {
      //          logoutSession();
      //          redirect('/login.php', 'Silahkan Login Kembali');
      //       }
      //    }
      // }
      if ($role != $auth_role) {
         logoutSession();
         redirect('/login.php', 'Anda Tidak Memiliki Akses');
      }
   } else {
      logoutSession();
      redirect('/login.php', 'Anda harus login terlebih dahulu');
   }
}
