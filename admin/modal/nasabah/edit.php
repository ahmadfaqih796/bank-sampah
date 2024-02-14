<div class="modal fade" id="editNasabah" tabindex="-1" role="dialog" aria-labelledby="editNasabahModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/nasabah.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="editNasabahModalLabel">Edit Nasabah <span id="name_nasabah"></span></h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" hidden name="id_nasabah" id="id_nasabah" class="form-control">
               <input type="text" hidden name="no_rekening" id="editNoRekening" class="form-control">
               <!-- <div class="mb-3">
                  <label for="editNoRekening">No Rekening</label>
                  <input type="text" name="no_rekening" id="editNoRekening" class="form-control">
               </div> -->
               <div class="mb-3">
                  <label for="editNik">NIK</label>
                  <input type="text" name="nik" id="editNik" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editRt">RT</label>
                  <input type="text" name="rt" id="editRt" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editRw">RW</label>
                  <input type="text" name="rw" id="editRw" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editAlamat">Alamat</label>
                  <input type="text" name="alamat" id="editAlamat" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editJmlWarga">Jumlah Warga</label>
                  <input type="text" name="jml_warga" id="editJmlWarga" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="editNasabah">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getNasabahData(data) {
      document.getElementById('id_nasabah').value = data['id'];
      document.getElementById('name_nasabah').innerHTML = data['fullname'];
      document.getElementById('editNoRekening').value = data['no_rekening'];
      document.getElementById('editNik').value = data['nik'];
      document.getElementById('editRt').value = data['rt'];
      document.getElementById('editRw').value = data['rw'];
      document.getElementById('editAlamat').value = data['alamat'];
      document.getElementById('editJmlWarga').value = data['jml_warga'];
   }
</script>