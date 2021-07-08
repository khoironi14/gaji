<div class="container" style="background-color:white;">
<div class="col-md-12">
<center>	<h3>Data Gaji Cor</h3></center>
<table class="table table-bordered" id="cor">
<thead>	
<tr>	
	<th>	No</th>
<th>	Tanggal</th>
<th>	Nama Karyawan</th>
<th>Alamat</th>
<th>TOnase</th>
<th>Gaji</th>
<th>Jumlah Hutang</th>
<th>Angsuran</th>
<th>Total Gaji</th>

<th width="20%">Action</th>


</tr>


</thead>
<tbody>	
</tbody>


	</table>
<a href="<?php echo base_url('Cor/input') ?>	" class="btn btn-success">New</a> <a href="<?php echo base_url('Cor/cetak_pdf') ?>	" class="btn btn-success">Cetak SLIP</a> 
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

    <!-- Modal angsuran -->
<div class="modal fade" id="modal-angsuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Angsuran Hutang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="<?php echo base_url('Cor/save_angsuran') ?>" method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Angsuran</th>
                </tr>
            </thead>
            <tbody>
                <?php $k=1; $i=1; $a=1; foreach ($angsur as $tampil) {
                    # code...
                ?>
                <tr>
                    <input type="hidden" name="id[<?=$i++?>]" value="<?=$tampil->id_cor?>">
                    <input type="hidden" name="id_karyawan[<?=$k++?>]" value="<?=$tampil->id_karyawan?>">
                    <td><?=$tampil->nama_karyawan?></td>
                    <td><input type="text" name="angsuran[<?=$a++?>]" class="form-control" value="<?=$tampil->angsuran?>"></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script type="text/javascript">
	
	var table;
	$(document).ready(function(){
table=$('#cor').DataTable({

"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Cor/get_data_gaji')?>",
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
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Cor/hapus/') ?>"+id);
});

    });
</script>
