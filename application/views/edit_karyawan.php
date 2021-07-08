<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h3>Form Tambah Karyawan</h3></center>
		<form action="<?php echo base_url('Karyawan/edit_karyawan') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_karyawan']?>">
			<label>Nama Karyawan</label>
			<input type="text" name="nama" value="<?=$edit['nama_karyawan']?>" class="form-control" required="">
			<label>Alamat</label>
			<input type="text" name="alamat" value="<?=$edit['alamat']?>" class="form-control" required="">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat" value="<?=$edit['tempat_lahir']?>" class="form-control" required="">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal" value="<?=$edit['tanggal_lahir']?>" class="form-control" required="">
			<label>Mulai Kerja</label>
			<input type="date" name="kerja" class="form-control" value="<?=$edit['mulai_kerja']?>" required="">
			<label>Kategori Karyawan</label>
			<select name="kategori" class="form-control">
				<?php foreach ($kategori as $tampil) {
					# code...
				 ?>
				<option value="<?=$tampil->id_kategori?>" <?php if ($tampil->id_kategori=$edit['id_kategori']) { echo "selected";
					
				} ?>><?=$tampil->nama_kategori?></option>
			<?php }?>
			</select>
			<button class="btn btn-success mt-1" name="simpan">Simpan</button>
			
		</form>
	</div>
</div>