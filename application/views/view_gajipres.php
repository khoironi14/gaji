<div class="container" style="background-color:white;">
	<div class="col-md-12">
		<center><h3>Data Gaji Pres/Cetak</h3></center>
		<div class="table table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="">Nama Karyawan </th>

					
					<th colspan="">Tanggal </th><th></th><th colspan="">Hari Kerja </th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($gaji as $tampil) {
					$id=$tampil->id_karyawan;
					$query=$this->db->query("SELECT * FROM `gaji_pres` join tb_barang on gaji_pres.id_barang=tb_barang.id_barang where id_karyawan='$id'")->result();
				 ?>
				<tr>
					<td><?=$tampil->nama_karyawan?></td>
					<td><?=date('d-m-Y',strtotime($tampil->tanggal))?></td>
					
					<td><div class="table table-responsive"><table class="table table-konseded">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Jumlah Jadi</th>

					<th>Berat/Kg</th>
					<th>Berat Total</th>
					<th>Biaya Cetak</th>
					<th>Upah</th>
					<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($query as $data) {
						# code...
					 ?>
							<tr>
								<td><?=$data->nama_barang?></td>
								<td><?=$data->jumlah_jadi?></td>
								<td><?=$data->berat?></td>
								<td><?=$data->jumlah_jadi * $data->berat ?></td>
								<td><?=$data->biaya_cetak?></td>
								<td><?=$data->upah?></td>
								<td width="30%"><a href="<?php echo base_url('Pres/edit_pres/'.$tampil->id_pres.'') ?>" class="btn btn-info">Edit</a><a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="<?php echo $tampil->id_pres ?>" >Hapus</a></td>
							</tr>
							<?php }?>
						</tbody>
					</table></div></td>
				<td colspan=""><?=$tampil->hari_kerja?></td>
				
				</tr>
			<?php }?>
			</tbody>
		</table>
		</div>
		<a href="<?php echo base_url('Pres/input_gaji') ?>" class="btn btn-success">New</a><a href="<?php echo base_url('Pres/cetak_pdf') ?>" class="btn btn-danger ml-1" target="blank">Cetak PDF</a>
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
modal.find('#hapus-true-data').attr("href","<?php echo base_url('Pres/hapus/') ?>"+id);
});

	});
</script>