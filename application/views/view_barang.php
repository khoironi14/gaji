<div class="container" style="background-color:white;">
<div class="col-md-12">
	<center><h4>Data Barang</h4></center>
<table class="table table-bordered" id="barang">
<thead>	
<tr>	

<th>No</th>
<th>Nama Barang</th>
<th>Berat</th>
<th>Biaya Cetak</th>
<th>Action</th>

</tr>


</thead>
<tbody>	

	<?php $no=1; foreach ($barang as $tampil) {
		# code...
	 ?>
<tr>	
<td><?=$no++?></td>
<td><?=$tampil->nama_barang?></td>
<td><?=$tampil->berat?></td>
<td><?=$tampil->biaya_cetak?></td>
<td><a href="<?php echo base_url('Barang/edit_barang/'.$tampil->id_barang.'') ?>" class="btn btn-primary">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="<?=$tampil->id_barang?>" >Hapus</a></td>
</tr>
<?php }?>


</tbody>


	</table>

<a href="<?php echo base_url('Barang/add_barang') ?>" class="btn btn-success">New</a>
	</div>

	</div>
	<script type="text/javascript">
  
 
  $(document).ready(function(){
 var table;
   
table=$('#barang').DataTable();


  });
</script>
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

	$(document).ready(function(){
 $('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)// Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')

 
var modal = $(this)
 
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Barang/hapus/') ?>"+id);
});

	});
</script>
