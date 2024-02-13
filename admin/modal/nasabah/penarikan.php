<div class="modal fade" id="penarikanNasabah" tabindex="-1" role="dialog" aria-labelledby="penarikanNasabahModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/nasabah.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="penarikanNasabahModalLabel">Penarikan Saldo <span id="p_name_nasabah"></span></h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" hidden name="p_id_nasabah" id="p_id_nasabah" class="form-control">
               <input type="text" hidden name="t_saldo" id="p_t_saldo" class="form-control">
               <!-- <div class="mb-3">
                  <label for="p_editNoRekening">No Rekening</label>
                  <input type="text" disabled name="no_rekening" id="p_editNoRekening" class="form-control">
               </div> -->
               <div class="mb-3">
                  <label for="p_saldo">Saldo</label>
                  <input type="text" disabled id="p_saldo" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="p_narik_saldo">Penarikan</label>
                  <input type="text" name="t_penarikan" id="p_narik_saldo" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="penarikanSaldoNasabah">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getNasabahData(data) {
      document.getElementById('p_id_nasabah').value = data['user_id'];
      document.getElementById('p_name_nasabah').innerHTML = data['fullname'];
      document.getElementById('p_editNoRekening').value = data['no_rekening'];
      document.getElementById('p_saldo').value = data['saldo'];
      document.getElementById('p_t_saldo').value = data['saldo'];
   }
</script>