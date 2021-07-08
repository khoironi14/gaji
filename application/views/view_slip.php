<div class="container" style="background-color:white;">
<div class="col-md-12">
<center>	<h3>Data Gaji Harian</h3></center>
<table class="table table-bordered" id="slip">
<thead>	
<tr>	
	<th>	No</th>
<th>	Tanggal</th>
<th>	Nama Karyawan</th>
<th>Alamat</th>
<th>Jam Kerja</th>
<th>	Jam Lembur</th>
<th>	Gaji</th>
<th>Action</th>


</tr>


</thead>
<tbody>	
</tbody>


	</table>
<a href="<?php echo base_url('Slip_gaji/slip_harian') ?>	" class="btn btn-success">New</a> <a href="<?php echo base_url('Slip_gaji/cetak_slip') ?>	" class="btn btn-danger" target="blank">Cetak SLIP</a> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#periode-kerja">
  Laporan Jam Kerja
</button> <a href="<?php echo base_url('Slip_gaji/laporan_gaji')?>"  class="btn btn-warning">Laporan Gaji</a>
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
	<!-- Modal -->
<div class="modal fade" id="periode-kerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Periode Kerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Slip_gaji/laporan') ?>" method="post">
          <div class="form-group">
            <label>Periode Awal</label>
            <input type="date" name="tgl_awal" class="form-control">
          </div>
           <div class="form-group">
            <label>Periode Akhir</label>
            <input type="date" name="tgl_akhir" class="form-control">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
       </form>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script type="text/javascript">
	
	var table;
	$(document).ready(function(){
table=$('#slip').DataTable({

"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Slip_gaji/get_data_gaji')?>",
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
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Slip_gaji/hapus/') ?>"+id);
});

    });
</script>