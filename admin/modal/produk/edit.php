<div class="modal fade" id="editProduk" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/produk.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input hidden value="<?= $_SESSION['auth_user']['id'] ?>" name="user_id" id="user_id">
               <input hidden name="id" id="editId">
               <div class="mb-3">
                  <label for="editName">Nama</label>
                  <input type="text" name="name" id="editName" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label for="editHBeli">Harga Beli</label>
                  <input type="text" name="h_beli" id="editHBeli" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="editHJual">Harga Jual</label>
                  <input type="text" name="h_jual" id="editHJual" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="editProduk">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getProductData(data) {
      document.getElementById('editId').value = data['id'];
      document.getElementById('editName').value = data['name'];
      document.getElementById('editHBeli').value = data['h_beli'];
      document.getElementById('editHJual').value = data['h_jual'];
   }
</script>