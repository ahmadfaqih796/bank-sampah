<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tabel Nasabah</title>
</head>

<body>
   <h1 style="text-align: center;">Daftar Nasabah</h1>
   <table border="1" cellspacing="0" cellpadding="5">
      <thead>
         <tr>
            <th>No</th>
            <th>Name</th>
            <th>No Rekening</th>
            <th>RT</th>
            <th>RW</th>
            <th>Alamat</th>
            <th>Jml Warga</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
            $nasabah = getFilterNasabah($_GET['tanggal']);
         } else {
            $nasabah = getNasabahAll();
         }
         if (mysqli_num_rows($nasabah) > 0) {
            foreach ($nasabah as $item) {
         ?>
               <tr>
                  <td><?= $item['id'] ?></td>
                  <td><?= $item['fullname'] ?></td>
                  <td><?= $item['no_rekening'] ?></td>
                  <td><?= $item['rt'] ?></td>
                  <td><?= $item['rw'] ?></td>
                  <td><?= $item['alamat'] ?></td>
                  <td><?= $item['jml_warga'] ?></td>
                  <td><?= $item['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                  <td><?= $item['created_at'] ?></td>
                  <td class="print_view">
                     <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editNasabah" onclick="getNasabahData(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                     <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteNasabah" onclick="getNasabahId(<?= $item['id'] ?>)">Hapus</button>
                  </td>
               </tr>
         <?php
            }
         }
         ?>
      </tbody>
   </table>
</body>

</html>