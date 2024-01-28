<div class="modal fade" id="addNasabah" tabindex="-1" role="dialog" aria-labelledby="addNasabahModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/nasabah.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="addNasabahModalLabel">Tambah Nasabah</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <label for="nasabah">Pilih Nasabah</label>
                  <select name="nasabah" id="nasabah" class="form-select" required>
                     <option value="">Pilih Nasabah</option>
                     <?php
                     $nasabah = getUsersByRole("user");
                     if (mysqli_num_rows($nasabah) > 0) {
                        foreach ($nasabah as $item) {
                     ?>
                           <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                     <?php
                        }
                     }
                     ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="no_rekening">No Rekening</label>
                  <input type="text" name="no_rekening" id="no_rekening" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="rt">RT</label>
                  <input type="text" name="rt" id="rt" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="rw">RW</label>
                  <input type="text" name="rw" id="rw" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="jml_warga">Jumlah Warga</label>
                  <input type="text" name="jml_warga" id="jml_warga" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="saveNasabah">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>