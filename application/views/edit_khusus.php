<div class="container">
	<div class="col-md-6">
		<form action="<?php echo base_url('Gaji_khusus/edit_gaji') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_khusus']?>">
			<label>Gaji</label>
			<input type="text" name="gaji" class="form-control" value="<?=$edit['besar_gaji']?>">
			<button class="btn btn-primary" name="simpan">Simpan</button>
		</form>
	</div>
</div>