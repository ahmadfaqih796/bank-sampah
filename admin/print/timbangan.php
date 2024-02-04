<?php

require_once __DIR__ . '../../../vendor/autoload.php';
require "../../config/query.php";

$mpdf = new \Mpdf\Mpdf();

if ($_GET['get'] == 'timbangan') {
   # code...
   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabel Transaksi Timbangan</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Daftar Transaksi Timbangan</h1>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>Nama</th>
               <th>No Rekening</th>
               <th>Alamat</th>
               <th>Total barang</th>
               <th>Total Harga</th>
               <th>Tanggal Dibuat</th>
            </tr>
         </thead>
         <tbody>';
   $no = 1;
   $date = $_GET['tanggal'];
   if ($date) {
      $timbangan = getTransaksiTimbanganByDate($_GET['tanggal']);
   } else {
      $timbangan = getTransaksiTimbangan();
   }
   $total = mysqli_num_rows($timbangan);
   // $html .= '<tr><td colspan="8">Total Data : ' . $total . '</td></tr>';
   foreach ($timbangan as $item) {
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['name'] . '</td>
            <td>' . $item['no_rekening'] . '</td>
            <td>' . $item['alamat'] . '</td>
            <td>' . $item['total_barang'] . '</td>
            <td>' . $item['total_harga'] . '</td>
            <td>' . $item['created_at'] . '</td>
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
