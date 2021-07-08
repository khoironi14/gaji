<div class="container">
	

	<div class="col-md-12" style="background-color:white;">


	<div class="form-row">
		<div class="col-md-3">
	<label>Nama Karyawan</label>
			<select id="id_karyawan" class="form-control">
				<option>--Pilih Karyawan--</option>
				<?php foreach ($karyawan as $tampil) {
					
				 ?>
				<option value="<?=$tampil->id_karyawan?>"><?=$tampil->nama_karyawan?></option>
			<?php }?>
			</select>
			</div>
<input type="hidden" id="karyawan">
			<div class="col-md-2"><label>Nama Barang</label><select  class="form-control" id="id_barang"> <?php foreach ($barang as $tampil) {
					# code...
				 ?> <option value="<?=$tampil->id_barang?>	"><?=$tampil->nama_barang?>	</option> <?php }?>	</select></div>
				 <input type="hidden" id="barang">


				 <div class="col-md-1"><label>Jml Jadi</label><input type="text"  id="jml_jadi" class="form-control"></div>
				 <div class="col-md-1"><label>Berat/Kg</label><input type="text" name="" id="berat" class="form-control"></div>
				 <div class="col-md-1"><label>Berat Total</label><input type="text" id="berat_total" class="form-control"></div>
				 <div class="col-md-2"><label>Biaya Cetak</label><input type="text" id="biaya" class="form-control"></div>
				 <div class="col-md-2"><label>Upah</label><input type="text" id="upah" class="form-control"></div>
	</div>
	<div class="form-group mt-3">
<button id="tambah" class="btn btn-danger">Tambah</button></div>
<form action="<?php echo base_url('Pres/input_gaji') ?>" method="post">
<table class="table table-konseded">
	<thead>
	<tr>
		<th>Nama Pelanggan</th>
		<th>Nama Barang</th>
		<th>Jumlah Jadi</th>
		<th>Berat/Kg</th>
		<th>Berat Total</th>
		<th>Biaya Cetak</th>
		<th>Upah</th>
	</tr>
	</thead>
	<tbody id="isi"></tbody>
	<tfoot>
		<tr>
			<td><label>Tanggal</label> <input type="date" name="tanggal" class="form-control" required=""></td>
			<td>
	<label>Jml Hari Kerja</label>
	<input type="text" name="hari_kerja" class="form-control" required=""></td>
	</tr>
	</tfoot>
</table>
<button class="btn btn-success" name="simpan">Simpan</button><a href="<?php echo base_url('Pres/index') ?>" class="btn btn-danger ml-1">Kembali</a>
 </form>
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		function hitung(){

			var ber=$('#berat_total').val();
			var bia=$('#biaya').val();
			var hasil=0;
			hasil=ber * bia;
			$('#upah').val(hasil);
		}
$('#id_karyawan').change(function(){
var kar=$('#id_karyawan').val();
$.ajax({
url:"<?=base_url('Pres/cek_nama')?>",
type:"POST",
data:{kar:kar},
success:function(data){
//alert(data);
$('#karyawan').val(data);	
}


});

}),
$('#id_barang').change(function(){
var barang=$('#id_barang').val();


$.ajax({

url:"<?php echo base_url('Pres/cek_biaya') ?>",
type:"POST",
data:{barang:barang},
dataType:"JSON",
success:function(data){
var biayaku=data.biaya;

$('#biaya').val(biayaku);

$('#barang').val(data.barang);
}
	
})

}),
$('#berat').keyup(function(){
var jadi=$('#jml_jadi').val();
var berat=$('#berat').val();
var hasil=0;
hasil=jadi*berat;
$('#berat_total').val(hasil);
hitung();

}),
$('#tambah').click(function(){



}),
$('#tambah').click(function(){
	var kar=$('#id_karyawan').val();
	var namekry=$('#karyawan').val();
	var barang=$('#id_barang').val();
	var jadi=$('#jml_jadi').val();
	var berat=$('#berat').val();
		var ber=$('#berat_total').val();
		var bia=$('#biaya').val();
		var upah=$('#upah').val();
		var namebrg=$('#barang').val();
var html='<tr>'
		+ '<td><input type="text" value="'+ namekry +'" class="form-control"><input type="hidden" name="karyawan[]" class="form-control" value="'+kar+'"></td>'
			+ '<td><input type="text" class="form-control" value="'+ namebrg +'"><input type="hidden" name="barang[]" class="form-control" value="'+barang+'"></td>'
			+ '<td><input type="text" name="jml_jadi[]" class="form-control" value="'+jadi+'"></td>'
			+ '<td><input type="text" name="berat[]" class="form-control" value="'+berat+'"></td>'
			+ '<td><input type="text" name="berat_total[]" class="form-control" value="'+ber+'"></td>'
			+ '<td><input type="text" name="biaya[]" class="form-control" value="'+bia+'"></td>'
			+ '<td><input type="text" name="upah[]" class="form-control" value="'+upah+'"></td>'
		+ '</tr>';

		$('#isi').append(html);
$('#jml_jadi').val('');
$('#berat').val('');
$('#barang').val('');
$('#berat_total').val('');
$('#biaya').val('');
$('#upah').val('');
$('#barang').val('');

});


	});
</script>