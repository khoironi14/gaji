<div class="container">
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
			
		<form action="<?php echo base_url('Hutang/add_hutang') ?>" method="post">
			 <div class="form-group">
			<label>Nama Karyawan</label>
			<select name="karyawan" class="form-control">
				<?php foreach ($karyawan as $tampil) {
					# code...
				 ?>
				<option value="<?=$tampil->id_karyawan?>"><?=$tampil->nama_karyawan?></option>
			<?php }?>
			 </select>
			</div>
			 <div class="form-group">
			 <label>Jumlah Hutang</label>
			 <input type="text" name="hutang" class="form-control" required="">
			</div>
			 <div class="form-group">
			 <label>Angsuran</label>
			 <input type="text" name="angsuran" class="form-control" required=""></div>
			 
			 <div class="form-group">
			 <label>Tanggal</label>
			 <input type="date" name="tanggal" class="form-control" required="">
			 </div>
			 <div class="form-group">
			 <button class="btn btn-success" name="simpan">Simpan</button>
			 </div>
		</form>

			</div>
		</div>
	</div>

</div>