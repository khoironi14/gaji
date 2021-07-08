<div class="container" style="background-color: white;">
	<div class="col-md-9">
		<center><h3>View Setting Data Gaji</h3></center>
		<table class="table table-bordere">
			<thead>
				<tr>
					<th>Nama Karyawan</th>
					<th>Gaji</th>
					<th>Lembur</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($gaji as $tampil) {
					# code...
				 ?>
				<tr>
					<td><?=$tampil->nama_karyawan?></td>
					<td><?=$tampil->gaji_perjam?></td>
					<td><?=$tampil->lembur?></td>
					<td><a href="<?php echo base_url('Setting/edit_gaji/'.$tampil->id_gaji.'') ?>" class="btn btn-info">Edit</a><a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="<?=$tampil->id_gaji?>" >Hapus</a></td>
				</tr>

			<?php }?>
			</tbody>
		</table>
<a href="<?php echo base_url('Setting/input_gaji') ?>" class="btn btn-success">Input Baru</a>
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

    $(document).ready(function(){
 $('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)// Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')

 
var modal = $(this)
 
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Setting/hapus_gaji/') ?>"+id);
});

    });
</script>
