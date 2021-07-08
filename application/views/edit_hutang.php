<div class="container">
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				
			
		<form action="<?php echo base_url('Hutang/edit_hutang') ?>" method="post">
			<input type="hidden" name="id" value="<?=$edit['id_hutang']?>">
			<label>Nama Karyawan</label>
			<select name="karyawan" class="form-control">
				<?php foreach ($karyawan as $tampil) {
					# code...
				 ?>
				<option value="<?=$tampil->id_karyawan?>"><?=$tampil->nama_karyawan?></option>
			<?php }?>
			 </select>
			 <label>Jumlah Hutang</label>
			 <input type="text" name="hutang" value="<?=$edit['jumlah_hutang']?>" class="form-control" required="">
			 <label>Angsuran</label>
			 <input type="text" name="angsuran" value="<?=$edit['angsuran']?>" class="form-control" required="">
			 <div class="form-group">
			 	
			
			 <label>Tanggal</label>
			 <input type="date" name="tanggal" class="form-control" value="<?=$edit['tanggal']?>" required=""> </div>
			 <div class="form-group">
			 <button class="btn btn-success" name="simpan">Simpan</button>
			 </div>
		</form>
		</div>
		</div>
	</div>

</div>