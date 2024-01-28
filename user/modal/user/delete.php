<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/user.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="deleteUserModalLabel">Hapus User</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input hidden type="text" name="id" id="deleteId" class="form-control" required>
               <p>Apakah anda yakin ingin menghapus user ini?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="deleteUser">Hapus</button>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
   function getUserId(id) {
      document.getElementById('deleteId').value = id;
   }
</script>