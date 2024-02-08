<?php

require_once __DIR__ . '../../../vendor/autoload.php';
require "../../config/query.php";

$mpdf = new \Mpdf\Mpdf();

if ($_GET['get'] == 'invoice') {
   # code...
   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabel Laporan Transaksi Lunas</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Laporan Transaksi Lunas</h1>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>Nama</th>
               <th>No Rekening</th>
               <th>Alamat</th>
               <th>Total barang</th>
               <th>Total Harga</th>
               <th>Metode Pembayaran</th>
               <th>Bayar</th>
               <th>Kembalian</th>
               <th>Tanggal Dibuat</th>
            </tr>
         </thead>
         <tbody>';
   $no = 1;
   $date = $_GET['tanggal'];
   if ($date) {
      $invoice = getFilterInvoice($_GET['tanggal']);
   } else {
      $invoice = getInvoice();
   }
   $total = mysqli_num_rows($invoice);
   // $html .= '<tr><td colspan="8">Total Data : ' . $total . '</td></tr>';
   foreach ($invoice as $item) {
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['name'] . '</td>
            <td>' . $item['no_rekening'] . '</td>
            <td>' . $item['alamat'] . '</td>
            <td>' . $item['t_barang'] . '</td>
            <td>' . $item['t_harga'] . '</td>
            <td>' . $item['m_pembayaran'] . '</td>
            <td>' . $item['bayar'] . '</td>
            <td>' . $item['kembalian'] . '</td>
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
   $no = 1;
   $timbangan = getTimbanganById($_GET['user_id'], $_GET['transaksi_id']);
   $total = mysqli_num_rows($timbangan);

   $rows = array();
   while ($row = mysqli_fetch_assoc($timbangan)) {
      $rows[] = $row;
   }

   $html = '<!DOCTYPE html>
   <html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabel Detail Laporan Timbangan</title>
   </head>
   
   <body>
      <h1 style="text-align: center;">Detail Laporan Timbangan</h1>
      <table width="50%" cellspacing="0" cellpadding="5">
         <tr>
            <td>Nama</td>
            <td>:</td>
            <td>' . $rows[0]['name'] . '</td>
         </tr>
         <tr>
            <td>No Rekening</td>
            <td>:</td>
            <td>' . $rows[0]['no_rekening'] . '</td>
         </tr>
         <tr>
            <td>RT</td>
            <td>:</td>
            <td>' . $rows[0]['rt'] . '</td>
         </tr>
         <tr>
            <td>RW</td>
            <td>:</td>
            <td>' . $rows[0]['rw'] . '</td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>' . $rows[0]['alamat'] . '</td>
         </tr>
      </table>
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
         <thead>
            <tr>
               <th>No</th>
               <th>Nama barang</th>
               <th>Harga</th>
               <th>Volume</th>
               <th>Total</th>
            </tr>
         </thead>
         <tbody>';
   foreach ($timbangan as $item) {
      $subtotal += $item['total'];
      $html .= '
         <tr>
            <td>' . $no++ . '</td>
            <td>' . $item['n_barang'] . '</td>
            <td>' . $item['h_jual'] . '</td>
            <td>' . $item['volume'] . '</td>
            <td>' . $item['total'] . '</td>
         </tr>
            ';
   }
   $html .= '
            <tr>
               <td colspan="4" align="right">Sub total</td>
            <td>' . $subtotal . '</td>
         </tr>
         </tbody>
      </table>
   </body>
   </html>';
   $mpdf->WriteHTML($html);
   $mpdf->Output();
}
