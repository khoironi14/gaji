<div class="container" style="background-color:white;">
	<div class="col-md-9">
		<center><h4>Form Setting Gaji</h4></center>
		<form action="<?php echo base_url('Setting/edit_gaji') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_gaji']?>">
			<label>Karyawan</label>
			<select name="karyawan" class="form-control">
				<?php foreach ($karyawan as $tampil) {
					# code...
			 ?>
				<option value="<?=$tampil->id_karyawan?>" <?php if ($edit['id_karyawan']==$tampil->id_karyawan) {
					echo "selected";
				} ?>><?=$tampil->nama_karyawan?></option>
			<?php }?>
			</select>
			<label>Gaji/Jam</label>
			<input type="text" name="gaji" class="form-control" value="<?=$edit['gaji_perjam']?>" required="">
			<label>Lembur</label>
				<input type="text" name="lembur" value="<?=$edit['lembur']?>" class="form-control" required="">
				<button class="btn btn-success" name="simpan">Simpan</button>
		</form>
	</div>
</div>