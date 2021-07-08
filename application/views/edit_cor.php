<div class="container" style="background-color: white;">
	<div class="col-md-6">
		<form action="<?php echo base_url('Cor/edit_gaji') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_cor']?>">
			<label>Tonase</label>
			<input type="text" name="tonase" value="<?=$edit['tonase']?>">
			<button name="simpan" class="btn btn-success">Simpan</button>
		</form>
	</div>
</div>