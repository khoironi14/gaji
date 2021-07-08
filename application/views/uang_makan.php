<div class="container">
	<div class="col-md-6">
		<form action="<?php echo base_url('Setting/uang_makan') ?>" method="post">
			<input type="hidden" name="id" value="<?=$makan['id_makan']?>">
			<label>Uang Makan</label>
			<input type="text" name="uang_makan" value="<?=$makan['besar']?>" class="form-control">
			<button class="btn btn-success" name="simpan">Simpan</button>
		</form>
	</div>
</div>