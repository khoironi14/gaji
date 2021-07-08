<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<form action="<?php echo base_url('Kategori/edit_kategori') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_kategori']?>">
			<label>Nama Kategori</label>
			<input type="text" name="nama_kategori" class="form-control" value="<?=$edit['nama_kategori']?>" required="">
			<button class="btn btn-primary mt-1" name="simpan">Simpan</button>
		</form>
	</div>
</div>