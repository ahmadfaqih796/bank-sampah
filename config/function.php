<?php
session_start();

require_once 'connection.php';

function validate($inputData)
{
   global $conn;
   return mysqli_real_escape_string($conn, $inputData);
}

function redirect($url, $status)
{
   $_SESSION['status'] = $status;
   header('Location: ' . $url);
   exit();
}

function alertMessage()
{
   if (isset($_SESSION['status'])) {
      $status = $_SESSION['status'];
      echo '
         <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-white"><strong>' . $status . '</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>';
      unset($_SESSION['status']);
   }
}

function logoutSession()
{
   unset($_SESSION['auth']);
   unset($_SESSION['auth_role']);
   unset($_SESSION['auth_user']);
}

function dateNow()
{
   $old_date = date('l, F d y h:i:s');
   $old_date_timestamp = strtotime($old_date);
   $new_date = date('Y-m-d H:i:s', $old_date_timestamp);
   return $new_date;
}
