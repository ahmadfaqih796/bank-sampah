<?php
require('../config/function.php');
require('authentication.php');
require('../config/query.php');
authentication('user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <title>
      Bank Sampah Asri Mandiri
   </title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- CSS Files -->
   <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
   <!-- Nepcha Analytics (nepcha.com) -->
   <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
   <!-- Data tables Bootstrap -->
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

   <script>
      $(document).ready(function() {
         $('#myTable').DataTable();
      });
   </script>
</head>

<body class="g-sidenav-show  bg-gray-100">

   <?php include 'sidebar.php'; ?>

   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <?php include 'navbar.php'; ?>

      <div class="container-fluid py-4">