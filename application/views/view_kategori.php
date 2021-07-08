<div class="container">
<div class="col-md-9">
	<table class="table table-bordered" style="background-color:white;" id="kategori">
		<thead>
			
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($kategori as $tampil) {
				
			 ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$tampil->nama_kategori?></td>
				<td><a href="<?php echo base_url('Kategori/edit_kategori/'.$tampil->id_kategori.'') ?>" class="btn btn-info">Edit</a><a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_kategori.'" >Hapus</a> </td>
			</tr>
		<?php }?>
		</tbody>
	</table>
<!--	<a href="<?php echo base_url('Kategori/add_kategori') ?>" class="btn btn-success">Tambah Kategori</a>-->
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
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script type="text/javascript">
	
	var table;
	$(document).ready(function(){
$('#kategori').DataTable();



});
	<script type="text/javascript">

    $(document).ready(function(){
 $('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)// Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')

 
var modal = $(this)
 
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Kategori/hapus/') ?>"+id);
});

    });
</script>