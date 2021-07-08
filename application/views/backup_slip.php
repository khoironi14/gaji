<div class="container" style="background-color:white;">
	<div class="col-md-12">
		<center><h3>SLIP GAJI HARIAN</h3></center>
		<div class="table table-responsive">
		<form action="<?php echo base_url('Slip_gaji/save_slip') ?>" method="post">
		<table class="table table-bordered" id="s">
			<thead>
				<tr>
					<th>#</th>
						<?php for ($i=1; $i <8 ; $i++) { 
						# code...
					 ?>
					<td colspan="2" width="5%"><input type="date" name="tanggal[<?=$i?>]" id="tanggal" class="form-control" ></td>
				<?php }?>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<th colspan="2">Minggu</th>
					<th colspan="2">Senin</th>
					<th colspan="2">Selasa</th>
					<th colspan="2">Rabu</th>
					<th colspan="2">Kamis</th>
					<th colspan="2">Jum'at</th>
					<th colspan="2">Sabtu</th>
				</tr>
				<tr>
					<th></th>
					<?php for ($i=1; $i <8 ; $i++) { 
						# code...
					 ?>
					<th width="7%">JK</th>
					<th width="7%">L</th>
				<?php }?>
				</tr>
			</thead>
			<tbody id="sakri">
				<?php $no=1; foreach ($karyawan as $tampil) {
					# code...
				 ?>
				<tr id="tr">
						<?php for ($i=1; $i <8 ; $i++) { 
						# code...
					 ?>
					<input type="text" name="id[<?=$i?>]" value="<?=$tampil->id_karyawan?>">
			<?php }?>
					<td><?=$tampil->nama_karyawan?></td>
					<?php for ($i=1; $i <8 ; $i++) { 
						# code...
					 ?>

					<td ><select name="jk[<?=$i?>]" id="jamkerja" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>"><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select></td>
					<td id="le"><select name="l[<?=$i?>]" id="lembur" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>"><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select></td>
				<?php }?>
				</tr>
			<?php }?>
			</tbody>
		</table>
		<button class="btn btn-success">Simpan</button>
		</form>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
 $("#s").on("change", "#jamkerja", function (event) {
 var jamkerja = $(this).closest("tr td").find("#jamkerja").val();
 var lembur=$('#sakri').closest("tr td").find("#lembur").val();
var tanggal=$(this).closest("tr td")   // Finds the closest row <tr> 
                       .find('input[name="tanggal"]')     // Gets a descendent with class="nr"
                       .val();
//alert(lembur);

});


	});
</script>