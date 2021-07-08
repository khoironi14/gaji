<div class="container" style="background-color:white;">
	<div class="col-md-9">
		<center><h4>Form Setting Gaji</h4></center>
		<form action="" method="post">
			<label>Karyawan</label>
			<select name="karyawan" class="form-control">
				<?php foreach ($karyawan as $tampil) {
					# code...
			 ?>
				<option value="<?=$tampil->id_karyawan?>"><?=$tampil->nama_karyawan?></option>
			<?php }?>
			</select>
			<label>Gaji/Jam</label>
			<input type="text" name="gaji" class="form-control" required="">
			<label>Lembur</label>
				<input type="text" name="lembur" class="form-control" required="">
				<button class="btn btn-success" name="simpan">Simpan</button>
		</form>
	</div>
</div>