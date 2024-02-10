<?php require('config/function.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?php
      if (isset($pageTitle)) {
         echo $pageTitle;
      } else {
         echo "Dashboard";
      }
      ?>
   </title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/styles.css">

   <style>
      .gambar {
         background-size: cover;
         object-fit: cover;
         height: 92vh;
         background-repeat: no-repeat;
         background-position: center;
      }

      .g1 {
         background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .4)), url('assets/img/b1.jpg');
      }

      .g2 {
         background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .4)), url('assets/img/b2.jpg');
      }
   </style>
</head>

<body>

   <?php include "navbar.php" ?>