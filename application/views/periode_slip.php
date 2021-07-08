<div class="container" style="background-color: white;">
	<div class="col-md-6">
		<center><h3>Periode Gaji</h3></center>
		<form action="<?php echo base_url('Slip_gaji/cetak_slip') ?>" method="post">
			<label>Periode Awal</label>
			<input type="date" name="periode_awal" class="form-control" required="">
			<label>Periode Akhir</label>
			<input type="date" name="periode_akhir" class="form-control" required="">
			<button class="btn btn-success" name="cari">Cari</button>
		</form>
	</div>
</div>