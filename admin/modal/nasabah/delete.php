<div class="modal fade" id="deleteNasabah" tabindex="-1" role="dialog" aria-labelledby="deleteNasabahModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/nasabah.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="deleteNasabahModalLabel">Hapus Nasabah</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input hidden type="text" name="id" id="deleteId" class="form-control" required>
               <p>Apakah anda yakin ingin menghapus nasabah ini ?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="deleteNasabah">Hapus</button>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
   function getNasabahId(id) {
      document.getElementById('deleteId').value = id;
   }
</script>