<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="action/timbangan.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="addDataModalLabel">Tambah Timbangan</h5>
					<button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" hidden value="<?= $_GET['nasabah'] ?>" name="user_id" id="user_id" class="form-control">
					<input type="text" hidden value="<?= $_GET['id_transaksi'] ?>" name="transaksi_id" id="transaksi_id" class="form-control">
					<div class="mb-3">
						<label for="produk">Pilih Produk</label>
						<select name="produk" id="produk" class="form-select" required>
							<option value="">Pilih Produk</option>
							<?php
							$produk = getAll("product");
							if (mysqli_num_rows($produk) > 0) {
								foreach ($produk as $item) {
							?>
									<option value="<?= $item['id'] . "&" . $item['h_jual'] . "&" . $item['h_beli'] ?>"><?= $item['name'] ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="volume">Volume</label>
						<input type="text" placeholder="Masukkan Volume (kg)" name="volume" id="volume" class="form-control">
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