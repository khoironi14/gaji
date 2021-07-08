<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h4>Form input Gaji Cor</h4></center>
		<form action="<?php echo base_url('Cor/input') ?>" method="post">
			<table class="table table-konseded">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Tonase</th>
						
					</tr>
				</thead>
				<tbody>
					<?php $k=1; $t=1; foreach  ($karyawan as $tampil) {
						
					 ?>
					 <input type="hidden" name="id_karyawan[<?=$k++?>]" value="<?=$tampil->id_karyawan?>">
					<tr>
						<td><?=$tampil->nama_karyawan?></td>
						<td><input type="text" name="tonase[<?=$t++?>]" class="form-control" required=""></td>
					</tr>
				<?php }?>
				<tr><td>Tanggal</td><td><input type="date" name="tanggal" class="form-control" required=""></td></tr>
				</tbody>
			</table>
			<button class="btn btn-success" name="simpan">Simpan</button>
		</form>
	</div>
</div>