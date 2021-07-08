<div class="container">
	<div class="col-md-12" style="background-color:white;">
		<CENTER><h3>Form Input Gaji</h3></CENTER>

		<form action="" method="post">
			<div class="form-row">
			<label>Nama Karyawan</label>
			<select name="karyawan" class="form-control">
				<option>--Pilih Karyawan--</option>
				<?php foreach ($karyawan as $tampil) {
					# code...
				 ?>
				<option value="<?=$tampil->id_karyawan?>"><?=$tampil->nama_karyawan?></option>
			<?php }?>
			</select>
			<table class="table table-konseded" id="list">
				<tbody id="isi">
					<tr><td>Tanggal</td><td><input type="date" name="tanggal" class="form-control"></td></tr>
				<tr><td>Nama Barang <select name="barang[]" onchange="tampil(this.value)" class="form-control" id="barang"> <?php foreach ($barang as $tampil) {
					# code...
				 ?> <option value="<?=$tampil->id_barang?>	"><?=$tampil->nama_barang?>	</option> <?php }?>	</select></td><td>Jumlah Jadi<input type="text" name="jml_jadi[]" id="jml_jadi" class="form-control"></td><td>Berat/kg<input type="text" name="berat[]" id="berat" class="form-control"></td>	<td>Berat Total<input type="text" name="berat_total[]" id="berat_total" class="form-control"></td> 
				
					<td id="cuk">Biaya Cetak <input type="text" name="biaya[]" id="biaya" data-index="1" class="form-control"></td><td>Upah<input type="text" name="upah[]" id="upah" class="form-control"></td></td><td>Hr Krja <input type="text" name="hari_kerja[]" class="form-control"></td>
				</tr>

				</tbody>
			</table>
			<button class="btn btn-success" name="simpan">Simpan</button>
			<a href="#" class="btn btn-info" id="new">New Baris</a>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function tampil(a){
var barang=a;
//alert(barang);

$.ajax({
url:"<?php echo base_url('Pres/cek_biaya') ?>",
type:"POST",
data:{barang:barang},
dataType:'json',
success:function(data){
alert(data.biaya);
document.getElementById("biaya").value = data.biaya;
}

});



	}
	$(document).ready(function(){
var id=1;
$('#new').click(function(){

	var html='<tr>'
	+ '<td>Nama Barang<select name="barang[]" onchange="tampil(this.value)"  class="form-control" id="barang"> <?php foreach ($barang as $tampil) {
					# code...
				 ?> <option value="<?=$tampil->id_barang?>	"><?=$tampil->nama_barang?>	</option> <?php }?>	</select></td><td>Jumlah Jadi<input type="text" name="jml_jadi[]" id="jml_jadi" class="form-control"></td><td>Berat/kg <input type="text" name="berat[]" id="berat" class="form-control"></td><td>Berat Total <input type="text" name="berat_total[]" id="berat_total" class="form-control"></td>'

	+ '<td id="cuk" >Biaya Cetak <input type="text" name="biaya[]" id="biaya" data-index="2"  class="form-control"></td><td>Upah <input type="text" name="upah[]" id="upah" class="form-control"></td><td>Hr Krja <input type="text" name="hari_kerja[]" class="form-control"> </td>'
	+ '</tr>';
  $('#isi').append(html);

}),
$('#list').on('keyup', '#berat', function() {
	var jadi = $(this).closest("tr").find("#jml_jadi").val();
var berat = $(this).closest("tr").find("#berat").val();
//alert(jadi);
var hasil=0;
hasil=berat * jadi;
$(this).closest("tr").find("#berat_total").val(hasil);

	}),
$('#list').on('keyup', '#biaya', function() {
	var biaya=$(this).closest("tr").find("#biaya").val();
var berat_total=$(this).closest("tr ").find("#berat_total").val();
//alert(berat_total);
var hasil=0;
hasil=biaya*berat_total;
$(this).closest("tr").find("#upah").val(hasil);

});
//$('#list').on('change', '#barang', function() {
//var barang = $(this).closest("tr").find("#barang").val();
//.ajax({

//url:"<?php echo base_url('Pres/cek_biaya') ?>",
//type:"POST",
//data:{barang:barang},
//dataType:"JSON",
//success:function(data){
//var biayaku=data.biaya;

//$('#cuk ').closest("tr ").find("#biaya").val(biayaku);
//
// $('#biaya ').each(function (index) {
//alert(index);

//$(this).closest("tr  ").find("#biaya").val(biayaku);
//$(this).closest('tr').find('td #biaya').val(biayaku);

// });


//}


//});

	//});

	});
</script>