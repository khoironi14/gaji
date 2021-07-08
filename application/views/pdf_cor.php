<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<h2 align="center">Laporan Gaji Cor</h2>
<table >
<thead>	
<tr>	
	<td>	No</td>
<td>	Tanggal</td>
<td>	Nama Karyawan</td>
<td>Alamat</td>
<td>Tonase</td>
<td>Gaji</td>
<td>Jumlah Hutang</td>
<td>Angsuran</td>
<td>Total Gaji</td>




</tr>


</thead>
<tbody>	
<?php $no=1; foreach ($pdf as $tampil) {
	# code...
 ?>
	<tr>
		<td><?=$no++?></td>
		<td><?=$tampil->tanggal?></td>
		<td><?=$tampil->nama_karyawan?></td>
			<td><?=$tampil->alamat?></td>
				<td><?=$tampil->tonase?></td>
				<td><?=$h=($tampil->tonase*250)/15;?></td>
				<td><?=$tampil->sisa_hutang?></td>
				<td><?=$tampil->jumlah_angsur?></td>
				<td><?=$h-$tampil->jumlah_angsur?></td>
	</tr>

<?php }?>
</tbody>


	</table>
</body>
</html>