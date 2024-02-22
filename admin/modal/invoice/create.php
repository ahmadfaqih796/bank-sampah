<div class="modal fade" id="addInvoice" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/transaksi.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="addInvoiceModalLabel">Penyetoran</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" hidden value="<?= $_GET['nasabah'] ?>" name="user_id" id="user_id" class="form-control">
               <input type="text" hidden value="<?= $_GET['id_transaksi'] ?>" name="transaksi_id" id="transaksi_id" class="form-control">
               <div class="mb-3">
                  <label>Total Barang</label>
                  <input disabled type="text" value="<?= $total_barang ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label>Total Harga</label>
                  <input disabled type="text" value="<?= $total_harga_beli ?>" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="m_penarikan">Setor</label>
                  <select name="m_penarikan" id="m_penarikan" class="form-select" required>
                     <option value="">Pilih Penyetoran</option>
                     <option value="tunai">Tunai</option>
                     <option value="saldo">Saldo</option>
                  </select>
               </div>
               <input type="text" hidden name="t_barang" id="t_barang" value="<?= $total_barang ?>" class="form-control">
               <input type="text" hidden name="t_harga" id="t_harga" value="<?= $total_harga_beli ?>" class="form-control">
               <input type="text" hidden name="t_harga_jual" id="t_harga_jual" value="<?= $subtotal ?>" class="form-control">
               <input type="text" hidden name="t_harga_beli" id="t_harga_beli" value="<?= $total_harga_beli ?>" class="form-control">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="saveInvoice">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   document.getElementById('m_penarikan').addEventListener('change', function() {
      var selectedId = this.value;
      var form_bayar = document.getElementById('form_bayar');
      var input_bayar = document.getElementById('bayar');
      if (selectedId === "tunai") {
         form_bayar.style.display = 'block';
      } else {
         form_bayar.style.display = 'none';
         input_bayar.value = 0;
      }
   });
   document.getElementById('m_penarikan').dispatchEvent(new Event('change'));
</script>