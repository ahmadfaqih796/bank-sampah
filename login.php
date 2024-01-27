<?php
$pageTitle = 'Login';
require('includes/header.php'); ?>

<div class="py-5">
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
                     <div class="mb-3">
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

<?php require('includes/footer.php'); ?>