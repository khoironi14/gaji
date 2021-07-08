<div class="container" style="background-color:white;">
	<div class="col-md-12">
		<center><h4>Data Angsuran</h4></center>
		<table class="table table-bordered" id="angsuran">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Karyawan</th>
					<th>Alamat</th>
					<th>Sisa Hutang</th>
					<th>Angsuran</th>
					<th>Tanggal</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
		<a href="<?php echo base_url('Angsur/save_angsuran') ?>" class="btn btn-success">Input Angsur</a>
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
table=$('#angsuran').DataTable({

"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Angsur/get_data_angsur')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },

            ],


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
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Angsur/hapus/') ?>"+id);
});

	});
</script>
