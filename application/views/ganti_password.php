<div class="container">
<div class="col-md-6">
	<?php
      echo $this->session->flashdata('pesan');?>
<form action="<?php echo base_url('Welcome/ganti_password') ?>" method="post">	
<label>	Password Lama</label>
<input type="password" name="password_lama" class="form-control" required="	">
<label>	Password Baru</label>
<input type="password" name="password_baru" class="form-control" required="	">
<button name="simpan" class="btn btn-success">Simpan</button>
</form>

	</div>

	</div>