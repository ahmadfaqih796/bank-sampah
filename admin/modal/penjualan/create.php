<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/penjualan.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="addModalLabel">Tambah Laporan</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <label for="tgl_penjualan">Tanggal Penjualan</label>
                  <input type="date" name="tgl_penjualan" id="tgl_penjualan" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="setoran">Rupiah Penjualan</label>
                  <input type="text" name="setoran" id="setoran" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="savePenjualan">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>