<div class="container">
<div class="col-md-6">
<form action="<?php echo base_url('Barang/edit_barang') ?>" method="post">
	<input type="hidden" name="id" value="<?=$edit['id_barang']?>">
<label>	Nama Barang</label>
<input type="text" name="nama_barang" value="<?=$edit['nama_barang']?>" class="form-control" required="">
<label>	Berat</label>
<input type="text" name="berat" value="<?=$edit['berat']?>" class="form-control" required="	">
<label>	Biaya Cetak</label>
<input type="text" name="biaya" value="<?=$edit['biaya_cetak']?>" class="form-control" required="	">
<button name="simpan" class="btn btn-success">Simpan</button>

	</form>


	</div>

	</div>