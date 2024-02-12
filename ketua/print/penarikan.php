<?php

require_once __DIR__ . '../../../vendor/autoload.php';
require "../../config/query.php";

$mpdf = new \Mpdf\Mpdf();

if ($_GET['get'] == 'detail') {


   $nasabah = getPenarikanSaldoById($_GET['id']);

   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabel Detail Laporan Penarikan Saldo</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Detail Laporan Penarikan Saldo</h1>
      <table width="50%" cellspacing="0" cellpadding="5">
         <tr>
            <td>Nama</td>
            <td>:</td>
            <td>' . $nasabah['name'] . '</td>
         </tr>
         <tr>
            <td>No Rekening</td>
            <td>:</td>
            <td>' . $nasabah['no_rekening'] . '</td>
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
            <td>Jumlah Warga</td>
            <td>:</td>
            <td>' . $nasabah['jml_warga'] . '</td>
         </tr>
         <tr>
            <td>Total Saldo</td>
            <td>:</td>
            <td>' . $nasabah['t_saldo'] . '</td>
         </tr>
         <tr>
            <td>Total Penarikan</td>
            <td>:</td>
            <td>' . $nasabah['t_penarikan'] . '</td>
         </tr>
         <tr>
            <td>Sisa Saldo</td>
            <td>:</td>
            <td>' . $nasabah['t_sisa_saldo'] . '</td>
         </tr>
      </table>
   </body>
   </html>';
   $mpdf->WriteHTML($html);
   $mpdf->Output();
}
