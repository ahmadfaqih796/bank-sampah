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
      <title>Laporan Keuangan</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Laporan Keuangan</h1>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>NIK</th>
               <th>Nama</th>
               <th>Tanggal dibuat</th>
               <th>Saldo bank sampah</th>
               <th>penarikan saldo</th>
               <th>Keuntungan</th>
            </tr>
         </thead>
         <tbody>';
   $no = 1;
   $t_h_jual = 0;
   $t_h_beli = 0;
   $t_keuntungan = 0;
   if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
      $report = getReportKeuanganByDate($_GET['tanggal']);
   } else {
      $report = getReportKeuangan();
   }
   // $html .= '<tr><td colspan="8">Total Data : ' . $total . '</td></tr>';
   foreach ($report as $item) {
      $t_h_jual += $item['saldo_bank'];
      $t_h_beli += $item['p_saldo'];
      $t_keuntungan += $item['p_keuntungan'];
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['nik'] . '</td>
            <td>' . $item['fullname'] . '</td>
            <td>' . $item['created_at'] . '</td>
            <td>' . ($item['saldo_bank'] ? $item['saldo_bank'] : 0) . '</td>
            <td>' . ($item['p_saldo'] ? $item['p_saldo'] : 0) . '</td>
            <td>' . ($item['p_keuntungan'] ? $item['p_keuntungan'] : 0) . '</td>
         </tr>
            ';
   }

   $html .= '
            <tr>
               <th colspan="4">Total</th>
               <th>' . $t_h_jual . '</th>
               <th>' . $t_h_beli . '</th>
               <th>' . $t_keuntungan . '</th>
            </tr>
         </tbody>
      </table>
   </body>
   </html>';

   $mpdf->WriteHTML($html);
   $mpdf->Output();
}
