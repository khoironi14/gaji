<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h3>Form Input Gaji Khusus</h3></center>
		<form action="<?php echo base_url('Gaji_khusus/input_gaji') ?>" method="post">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Karyawan</th>
						<th>Gaji</th>
					</tr>
				</thead>
				<tbody>
					<?php $k=1; $g=1; $no=1; foreach ($karyawan as $tampil) {
						# code...
					 ?>
					 <input type="hidden" name="id[<?=$k++?>]" value="<?=$tampil->id_karyawan?>">
					<tr>
						<td><?=$no++?></td>
						<td><input type="text" value="<?=$tampil->nama_karyawan?>" class="form-control"></td>
						<td><input type="text" name="gaji[<?=$g++?>]" class="form-control" required=""></td>
					</tr>
					
						
					
				<?php }?>
				<tr><td colspan="2">Tanggal Gajian</td><td><input type="date" name="tanggal" class="form-control" required=""></td></tr>
				</tbody>
			</table>
			<button name="simpan" class="btn btn-success">Simpan</button>
		</form>
	</div>
</div>