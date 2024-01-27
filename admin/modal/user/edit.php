<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/user.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input hidden type="text" name="id" id="editId" class="form-control" required>
               <div class="mb-3">
                  <label for="editName">Nama</label>
                  <input type="text" name="name" id="editName" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label for="editPhone">No. Telepon</label>
                  <input type="text" name="phone" id="editPhone" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editEmail">Email</label>
                  <input type="text" name="email" id="editEmail" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="role">Pilih Role</label>
                  <select name="role" id="editRole" class="form-select" required>
                     <option value="">Pilih Role</option>
                     <option value="admin">Admin</option>
                     <option value="user">User</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="userId" id="userId" value="">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="editUser">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
   function getUserID(data) {
      document.getElementById('editId').value = data['id'];
      document.getElementById('editName').value = data['name'];
      document.getElementById('editEmail').value = data['email'];
      document.getElementById('editPhone').value = data['phone'];
      const roleDropdown = document.getElementById('editRole');
      const roleValue = data['role'];
      for (var i = 0; i < roleDropdown.options.length; i++) {
         console.log(roleDropdown.options[i].value)
         if (roleDropdown.options[i].value == roleValue) {
            roleDropdown.options[i].selected = true;
         }
      }
   }
</script>