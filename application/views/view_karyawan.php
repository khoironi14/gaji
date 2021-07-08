<div class="container" style="background-color:white;">
  <div class="col-md-3 mt-2">
    <label> Kategori Karyawan</label>
    <select name="kategori" id="kategori" class="form-control">
      <?php foreach ($kategori as $tampil) {
        # code...
      ?>
      <option value="<?=$tampil->id_kategori?>"><?=$tampil->nama_kategori?></option>
    <?php }?>
    </select>
  </div>
<div class="col-md-12">
  <div class="card">
<div class="card-header"> <center><h3>Data Karyawan</h3></center><a href="<?php echo base_url('Karyawan/add_karyawan') ?>" class="btn btn-success">Tambah Data</a> </div>
<div class="  card-body">


	<table class="table table-bordered" id="karyawan">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Karyawan</th>
				<th>Alamat</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Mulai Kerja</th>
				<th>Kategori Karyawan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody ></tbody>
	</table>
	
</div>
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


<script type="text/javascript">
  
  var table;
  $(document).ready(function(){
load_data();
    function  load_data(kategori){
table=$('#karyawan').DataTable({

"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Karyawan/get_data_karyawan')?>",
                "type": "POST",
                data:{kategori:kategori}
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },

            ],


});
}
$(document).on('change','#kategori',function(){
var kategori=$(this).val();
$('#karyawan').DataTable().destroy();
if (kategori !='') {
  load_data(kategori);
}else{

  load_data();
}

});

  });
</script>


<script type="text/javascript">

	$(document).ready(function(){
 $('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)// Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')

 
var modal = $(this)
 
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Karyawan/hapus/') ?>"+id);
});

	});
</script>
