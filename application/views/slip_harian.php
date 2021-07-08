<div class="container" style="background-color:white;">
	<div class="col-md-12">
		<center><h3>SLIP GAJI HARIAN</h3></center>
		<div class="table table-responsive">
		<form action="<?php echo base_url('Slip_gaji/save_slip') ?>" method="post">
		<table class="table table-bordered" id="s">
		<thead>	
			<tr>	
					<th colspan="2">	Tanggal Kerja</th>
					<th>	<input type="date" name="tanggal" id="tanggal" class="form-control" required=""></th>

			</tr>
				<tr>	
						<th>Nama Karyawan</th>
						<th>Absen</th>
						<th>	Jam kerja</th>
						<th>Lembur</th>
						
				</tr>
		</thead>
		<tbody>	
			<?php $no=1; $k=1; $l=1; $a=1; foreach ($karyawan as $tampil) {
					# code...
				 ?>
				<tr>	
					<input type="hidden" name="id[<?=$no++?>]" value="<?=$tampil->id_karyawan?>">
						<td><?=$tampil->nama_karyawan?></td>
						<td><select name="absen[<?=$a++?>]" id="absen" class="form-control">
						<option value="Hadir">Hadir</option>
						<option value="Tidak">Tidak Hadir</option>
					</select></td>
						<td ><select name="jk[<?=$k++?>]" id="jamkerja" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>"><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select></td>

					<td id="le"><select name="l[<?=$l++?>]" id="lembur" class="form-control">
						<?php foreach ($angka as $tampil) {
							# code...
						 ?>
						<option value="<?=$tampil->angka_kerja?>"><?=$tampil->angka_kerja?></option>
					<?php }?>
					</select></td>

				</tr>
<?php }?>
		</tbody>
		</table>
		<button class="btn btn-success">Simpan</button>
		</form>
		</div>
	</div>
</div>
<!--Modal untuk Hapus data -->
  <div class="modal" tabindex="-1" role="dialog" id="modal-konfirmasi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body btn-info">
        <p>Apakah Yakin Anda akan menghapusnya ?</p>
      </div>
      <div class="modal-footer">
         <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Ya</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
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

}),
  $("#s").on("change", "#absen", function (event) {
var  absen=$(this).closest("tr td").find("#absen").val();
//alert(absen);
if (absen=="Tidak") {

$(this).closest("tr").find("#jamkerja").val();

}

  });


	});
</script>