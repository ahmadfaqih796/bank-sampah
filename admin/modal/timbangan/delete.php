<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/timbangan.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="deleteDataModalLabel">Hapus Timbangan <span id="deleteNasabah"></span></h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input hidden type="text" name="id" id="deleteId" class="form-control" required>
               <input hidden type="text" name="user_id" id="userId" class="form-control" required>
               <input hidden type="text" name="transaksi_id" id="transaksiId" class="form-control" required>
               <input hidden type="text" name="total_harga" id="totalHarga" class="form-control" required>
               <p>Apakah anda yakin ingin menghapus timbangan ini ?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="deleteData">Hapus</button>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
   function getData(data) {
      document.getElementById('deleteId').value = data['id'];
      document.getElementById('deleteNasabah').innerHTML = data['name'];
      document.getElementById('userId').value = data['user_id'];
      document.getElementById('transaksiId').value = data['id_transaksi'];
      document.getElementById('totalHarga').value = data['total_harga'];
      // document.getElementById('editNoRekening').value = data['no_rekening'];
      // document.getElementById('editNik').value = data['nik'];
      // document.getElementById('editRt').value = data['rt'];
      // document.getElementById('editRw').value = data['rw'];
      // document.getElementById('editAlamat').value = data['alamat'];
      // document.getElementById('editJmlWarga').value = data['jml_warga'];
   }
</script>