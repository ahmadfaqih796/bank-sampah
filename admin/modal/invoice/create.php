<div class="modal fade" id="addInvoice" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/timbangan.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="addInvoiceModalLabel">Bayar</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" hidden value="<?= $_GET['nasabah'] ?>" name="user_id" id="user_id" class="form-control">
               <input type="text" hidden value="<?= $_GET['id_transaksi'] ?>" name="transaksi_id" id="transaksi_id" class="form-control">
               <div class="mb-3">
                  <label for="produk">Pilih Pembayaran</label>
                  <select name="produk" id="produk" class="form-select" required>
                     <option value="">Pilih Pembayaran</option>
                     <option value="tunai">Tunai</option>
                     <option value="saldo">Saldo</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="bayar">Bayar</label>
                  <input type="text" name="bayar" id="bayar" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="saveData">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>