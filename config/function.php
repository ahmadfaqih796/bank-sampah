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

function alertMessage($code)
{
   if (isset($_SESSION['status'])) {
      $status = $_SESSION['status'];
      if ($code == 200) {
         echo '
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
            <span class="alert-text text-white"><strong>' . $status . '</strong> This is a success alert—check it out!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>';
      }
      unset($_SESSION['status']);
   }
}
