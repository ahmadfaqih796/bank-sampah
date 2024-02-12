<?php

require_once __DIR__ . '../../../vendor/autoload.php';
require "../../config/query.php";

$mpdf = new \Mpdf\Mpdf();

if ($_GET['get'] == 'all') {
   # code...
   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabel Produk</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Daftar Produk</h1>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>Nama</th>
               <th>Harga Jual</th>
               <th>Harga Beli</th>
            </tr>
         </thead>
         <tbody>';
   $no = 1;
   $product = getAll('product');
   $total = mysqli_num_rows($product);
   foreach ($product as $item) {
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['name'] . '</td>
            <td>' . $item['h_jual'] . '</td>
            <td>' . $item['h_beli'] . '</td>
         </tr>
            ';
   }

   $html .= '</tbody>
      </table>
   </body>
   </html>';

   $mpdf->WriteHTML($html);
   $mpdf->Output();
}
