<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<style>
td {
    padding: 3px 5px 3px 5px;
    border-right: 1px solid #666666;
    border-bottom: 1px solid #666666;
}
 
.head td {
    font-weight: bold;
    font-size: 10px;
    background: #b7f0ff; 
}
 
table .main tbody tr td {
    font-size: 10px;
}
 
table, table .main {
    width: 100%;
    border-top: 1px solid #666;
    border-left: 1px solid #666;
    border-collapse: collapse;
    background: #fff;
}
 
h1 {
    font-size:20px;
}
</style>
</head>
<body>
<h2 align="center">Laporan Jam Kerja Karyawan Harian </h2>
<h3 align="center">CV DWI JASA LOGAM BOYOLALI</h3>
<table class="">
	<thead>

		<tr>
			<td>Nama Karyawan</td>

<?php foreach ($report as $data) {
	$tgl=$data->tanggal;
	
 ?>
			<td colspan="2"><?=$data->tanggal?></td>
		<?php }?>
		</tr>
		<tr><td></td> <?php foreach ($report as $data) {?><td>Jk</td><td>L</td><?php }?></tr>
		</thead>
		<tbody>
			<?php $totaljam=0; $j=0; foreach ($laporan as $data) {

$id=$data->id_karyawan;
$awal=$this->uri->segment(3);
$akhir=$this->uri->segment(4);
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


</div>
</div>
</body>
</html>