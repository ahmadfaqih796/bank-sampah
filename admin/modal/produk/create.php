<div class="modal fade" id="addProduk" tabindex="-1" role="dialog" aria-labelledby="addProdukModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="action/produk.php" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="addProdukModalLabel">Tambah Produk</h5>
               <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input value="<?= $_SESSION['auth_user']['id'] ?>" name="user_id" id="user_id">
               <div class="mb-3">
                  <label for="name">Nama</label>
                  <input type="text" name="name" id="name" class="form-control" required>
               </div>
               <div class="mb-3">
                  <label for="h_beli">Harga Beli</label>
                  <input type="text" name="h_beli" id="h_beli" class="form-control">
               </div>
               <div class="mb-3">
                  <label for="h_jual">Harga Jual</label>
                  <input type="text" name="h_jual" id="h_jual" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
               <button type="submit" class="btn bg-gradient-primary" name="saveProduk">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>