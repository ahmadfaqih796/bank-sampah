<?php
$pageTitle = 'Login';
require('config/function.php');
$role = isset($_SESSION['auth']) == true ? $_SESSION['auth_role'] : '';
if (isset($_SESSION['auth'])) {
   if ($role == "admin") {
      redirect('/admin/index.php', 'Anda Sudah Login');
   } else if ($role == "user") {
      redirect('/user/index.php', 'Anda Sudah Login');
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      Login
   </title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/styles.css">
   <style>
      .bg-image {
         background-image: linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, .6)), url('https://mdbootstrap.com/img/Photos/Others/images/79.jpg');
         background-size: cover;
         object-fit: cover;
         height: 100vh;
         background-repeat: no-repeat;
         background-position: center;
      }
   </style>
</head>

<body class="bg-image">
   <div class="d-flex align-items-center min-vh-100">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-header text-center">
                     <h4>Login</h4>
                  </div>
                  <div class="card-body shadow">
                     <?php alertMessage() ?>
                     <form action="action/login.php" method="post">
                        <div class="mb-3">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-4">
                           <label for="password" class="form-label">Password</label>
                           <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary w-100" name="loginBtn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/jquery-3.7.1.min.js"></script>
</body>

</html>