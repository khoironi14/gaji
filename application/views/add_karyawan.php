<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h3>Form Tambah Karyawan</h3></center>
		<form action="<?php echo base_url('Karyawan/add_karyawan') ?>" method="post">
			<label>Nama Karyawan</label>
			<input type="text" name="nama" class="form-control" required="">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" required="">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat" class="form-control" required="">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal" class="form-control" required="">
			<label>Mulai Kerja</label>
			<input type="date" name="kerja" class="form-control" required="">
			<label>Kategori Karyawan</label>
			<select name="kategori" class="form-control">
				<?php foreach ($kategori as $tampil) {
					# code...
				 ?>
				<option value="<?=$tampil->id_kategori?>"><?=$tampil->nama_kategori?></option>
			<?php }?>
			</select>
			<button class="btn btn-success mt-1" name="simpan">Simpan</button>
			
		</form>
	</div>
</div>