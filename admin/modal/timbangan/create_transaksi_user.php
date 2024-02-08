<div class="modal fade" id="addNasabah" tabindex="-1" role="dialog" aria-labelledby="addNasabahModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
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
                        <option value="<?= $item['id'] ?>"><?= $item['name'] . " - " . $item['alamat'] ?></option>
                  <?php
                     }
                  }
                  ?>
               </select>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-gradient-primary" id="submitBtn">Tambah</button>
         </div>
      </div>
   </div>
</div>

<script>
   function getTransaksiId(id) {
      document.getElementById('submitBtn').addEventListener('click', function() {
         var selectedId = document.getElementById('nasabah').value;
         if (selectedId) {
            window.location.href = "/admin/timbangan_create.php?nasabah=" + selectedId + "&id_transaksi=" + id;
         }
      });
   }
</script>