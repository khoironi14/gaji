<div class="container">
<div class="col-md-6">
<form action="<?php echo base_url('Pres/edit_pres') ?>	" method="post">
<input type="hidden" name="id" value="<?=$edit['id_pres']?>">

<label>	Nama Barang</label>
<select name="barang" class="form-control" id="barang"> <?php foreach ($barang as $tampil) {
					# code...
				 ?> <option value="<?=$tampil->id_barang?>" <?php if ($edit['id_barang']==$tampil->id_barang) {
				 	echo "selected";
				 } ?>><?=$tampil->nama_barang?>	</option> <?php }?>	</select>
<label>	Jumlah Jadi</label>
<input type="text" name="jml_jadi" id="jml_jadi" class="form-control" value="<?=$edit['jumlah_jadi']?>">
<label>	Berat /Kg</label>
<input type="text" name="berat" id="berat" class="form-control" value="<?=$edit['berat']?>">
<label>	Berat Total</label>
<input type="text" name="berat_total" id="berat_total" class="	form-control">
<label>	Biaya Cetak</label>
<input type="text" name="biaya" id="biaya" class="form-control" value="<?=$edit['biaya_cetak']?>">
<div class="form-group">
<label>Upah</label>
<input type="text" name="upah" id="upah" class="form-control"></div>
<div class="form-group">
<button class="	btn btn-success" name="simpan">	Simpan</button> <a href="<?php echo base_url('Pres/index') ?>" class="btn btn-danger">Kembali</a> </div>
	</form>

	</div>

	</div>


	<script type="text/javascript">
		$(document).ready(function(){

var jadi=$('#jml_jadi').val();
var berat=$('#berat').val();
var hasil=0;
hasil=jadi * berat;
$('#berat_total').val(hasil);
var berat_total=$('#berat_total').val();
var biaya=$('#biaya').val();
var upah=0;
upah=berat_total*biaya;
$('#upah').val(upah);
$(this).keyup(function(){

var jadi=$('#jml_jadi').val();
var berat=$('#berat').val();
var hasil=0;
hasil=jadi * berat;
$('#berat_total').val(hasil);
var berat_total=$('#berat_total').val();
var biaya=$('#biaya').val();
var upah=0;
upah=berat_total*biaya;
$('#upah').val(upah);

});


		});
	</script>