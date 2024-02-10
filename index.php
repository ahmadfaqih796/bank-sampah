<?php
$pageTitle = 'Home';
require('includes/header.php'); ?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
   <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
   </div>
   <div class="carousel-inner">
      <div class="carousel-item active">
         <div class="d-block w-100 gambar g1" alt="Slide 1"></div>
         <div class="container">
            <div class="carousel-caption text-start">
               <h1>Bank Sampah</h1>
               <p>Bank sampah adalah suatu tempat yang digunakan untuk mengumpulkan sampah yang sudah dipilah-pilah. Hasil dari pengumpulan sampah yang sudah dipilah akan disetorkan ke tempat pembuatan kerajinan dari sampah atau ke tempat Pengepul sampah.</p>
               <p><a class="btn btn-lg btn-primary" href="login.php">Login</a></p>
            </div>
         </div>
      </div>
      <div class="carousel-item">
         <div class="d-block w-100 gambar g2" alt="Slide 2"></div>
         <div class="container">
            <div class="carousel-caption">
               <h1>Bagaimana Cara Kerja bank sampah?</h1>
               <p>Dalam bank sampah terdapat petugas yang bekerja menimbang sampah, petugas yang mencatat berat sampah yang disetorkan anggota, pengelola tabungan yang mencatat hasil setoran, dan yang terakhir adalah petugas yang melakukan negosiasi terhadap pengepul sampah kemudian menerima uang dari pengepul.</p>
               <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
            </div>
         </div>
      </div>
   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
   </button>
</div>

<?php require('includes/footer.php'); ?>