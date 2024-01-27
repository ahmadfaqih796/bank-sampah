<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="" method="post">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  <label for="name">Nama</label>
                  <input type="text" name="name" id="name" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label for="phone">No. Telepon</label>
                  <input type="text" name="phone" id="phone" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="role">Pilih Role</label>
                  <select name="role" id="role" class="form-select" required>
                     <option value="">Pilih Role</option>
                     <option value="admin">Admin</option>
                     <option value="user">User</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary">Simpan</button>
            </div>
         </div>
      </form>
   </div>
</div>