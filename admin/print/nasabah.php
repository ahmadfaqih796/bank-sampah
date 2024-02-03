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
      <title>Tabel Nasabah</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Daftar Nasabah</h1>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>Name</th>
               <th>No Rekening</th>
               <th>Saldo</th>
               <th>RT</th>
               <th>RW</th>
               <th>Alamat</th>
               <th>Jml Warga</th>
               <th>Tanggal Dibuat</th>
            </tr>
         </thead>
         <tbody>';
   $no = 1;
   $date = $_GET['tanggal'];
   if ($date) {
      $nasabah = getFilterNasabah($_GET['tanggal']);
   } else {
      $nasabah = getNasabahAll();
   }
   $total = mysqli_num_rows($nasabah);
   // $html .= '<tr><td colspan="8">Total Data : ' . $total . '</td></tr>';
   foreach ($nasabah as $item) {
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['fullname'] . '</td>
            <td>' . $item['no_rekening'] . '</td>
            <td>' . $item['saldo'] . '</td>
            <td>' . $item['rt'] . '</td>
            <td>' . $item['rw'] . '</td>
            <td>' . $item['alamat'] . '</td>
            <td>' . $item['jml_warga'] . '</td>
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

if ($_GET['get'] == 'detail') {
   $nasabah = getNasabahById($_GET['id']);


   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Detail Nasabah</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Detail Nasabah</h1>
      <table width="50%" cellspacing="0" cellpadding="5">
         <tr>
            <td>Name</td>
            <td>:</td>
            <td>' . $nasabah['fullname'] . '</td>
         </tr>
         <tr>
            <td>No Rekening</td>
            <td>:</td>
            <td>' . $nasabah['no_rekening'] . '</td>
         </tr>
         <tr>
            <td>Saldo</td>
            <td>:</td>
            <td>' . $nasabah['saldo'] . '</td>
         </tr>
         <tr>
            <td>RT</td>
            <td>:</td>
            <td>' . $nasabah['rt'] . '</td>
         </tr>
         <tr>
            <td>RW</td>
            <td>:</td>
            <td>' . $nasabah['rw'] . '</td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>' . $nasabah['alamat'] . '</td>
         </tr>
         <tr>
            <td>Jml Warga</td>
            <td>:</td>
            <td>' . $nasabah['jml_warga'] . '</td>
         </tr>
         <tr>
            <td>Tanggal Dibuat</td>
            <td>:</td>
            <td>' . $nasabah['created_at'] . '</td>
         </tr>
      </table>
   </body>
   </html>';

   $mpdf->WriteHTML($html);
   $mpdf->Output();
}
