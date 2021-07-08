<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h4>Edit Gaji Harian</h4></center>
		<form action="<?php echo base_url('Slip_gaji/edit_slip') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_slip']?>">
			<label>Nama Karyawan</label>
			<input type="text" name="" class="form-control" value="<?=$this->uri->segment(4)?>" readonly> 
			<label>Jam Kerja</label>
			<select name="jk" id="jamkerja" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>" <?php if ($edit['jk']==$tampil->angka_kerja) {
							echo "selected";
						} ?>><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select>
					<label>Lembur</label>

					<select name="lembur" id="lembur" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>"  <?php if ($edit['l']==$tampil->angka_kerja) {
							echo "selected";
						} ?>><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select>
					<button class="btn btn-success" name="simpan">Simpan</button>
		</form>
	</div>
</div>