<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
<div class="container" style="background-color:white;">
<div class="col-md-12">
	<center><h4>Laporan Jam Kerja Karyawan Harian</h4></center>
<table class="table table-bordered">
	<thead>

		<tr>
			<th>Nama Karyawan</th>

<?php foreach ($report as $data) {
	$tgl=$data->tanggal;
	
 ?>
			<th colspan="2"><?=$data->tanggal?></th>
		<?php }?>
		</tr>
		<tr><th></th> <?php foreach ($report as $data) {?><th>Jk</th><th>L</th><?php }?></tr>
		</thead>
		<tbody>
			<?php $totaljam=0; $j=0; foreach ($laporan as $data) {

$id=$data->id_karyawan;
$awal=$this->input->post('tgl_awal');
$akhir=$this->input->post('tgl_akhir');
	$query=$this->db->query("select * from slip_gaji_harian where tanggal in (select tanggal from slip_gaji_harian where tanggal between '$awal' and '$akhir' ) and id_karyawan='$id' order by tanggal asc ")->result();
	$sum=$this->db->query("SELECT sum(jk) as jamkerja,sum(l) as lembur FROM `slip_gaji_harian`  group by tanggal order by tanggal asc ")->result();


			//->get_where('slip_gaji_harian',['id_karyawan'=>$id])
			//->result();
				?>
			<tr>
				<td><?=$data->nama_karyawan?></td>
				<?php foreach ($query as $tampil) {
					# code...
				 ?>
				<td><?=$tampil->jk?></td> <td><?=$tampil->l?></td> <?php  }?>
			</tr>

		<?php  }?>

		<tr><td>Total</td><?php foreach ($sum as $ha) {
					# code...
				 ?><td><?=$ha->jamkerja;?></td><td><?=$ha->lembur;?></td><?php }?></tr>
		</tbody>
</table>
<a href="<?php echo base_url('Slip_gaji/cetak_laporan/'.$awal.'/'.$akhir.'') ?>" target="blank" class="btn btn-danger">Cetak PDF</a> <a href="<?php echo base_url('Slip_gaji/index') ?>" class="btn btn-warning">Kembali</a>

</div>
</div>