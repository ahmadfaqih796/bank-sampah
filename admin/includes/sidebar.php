<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php">
         <h4>Bank Sampah</h4>
      </a>
   </div>
   <hr class="horizontal dark mt-0">
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link <?= getActiveLink("index") ?>" href="index.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-home <?= getColorLink("index") ?> text-lg"></i>
               </div>
               <span class="nav-link-text ms-1">Dashboard</span>
            </a>
         </li>
         <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Management</h6>
         </li>
         <li class="nav-item">
            <a class="nav-link  <?= getActiveLink("users") ?>" href="users.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-home <?= getColorLink("users") ?> text-lg"></i>
               </div>
               <span class="nav-link-text ms-1">Users</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?= getActiveLink("nasabah") ?>" href="nasabah.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-home <?= getColorLink("nasabah") ?> text-lg"></i>
               </div>
               <span class="nav-link-text ms-1">Nasabah</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?= getActiveLink("produk") ?>" href="produk.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-home <?= getColorLink("produk") ?> text-lg"></i>
               </div>
               <span class="nav-link-text ms-1">Produk</span>
            </a>
         </li>
         <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
         </li>
         <li class="nav-item">
            <a class="nav-link <?= getActiveLink("produk") ?>" href="produk.php">
               <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-home <?= getColorLink("produk") ?> text-lg"></i>
               </div>
               <span class="nav-link-text ms-1">Penimbangan</span>
            </a>
         </li>
      </ul>
   </div>
   <div class="sidenav-footer mx-3 ">
      <a class="btn bg-gradient-primary mt-3 w-100" href="../../action/logout.php">Logout</a>
   </div>
</aside>