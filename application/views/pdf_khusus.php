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
	<h2 align="center">Gaji Khusus</h2>
<table class="" id="gaji">
			
				<tr>
					<td>No</td>
					<td>Tanggal Gajian</td>
					<td>Nama Karyawan</td>
					<td>Alamat</td>
					<td>Besar Gaji</td>
					
				</tr>
				<?php $no=1; foreach ($pdf as $tampil) {
					# code...
				 ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$tampil->tanggal?></td>
				<td><?=$tampil->nama_karyawan?></td>
				<td><?=$tampil->alamat?></td>
				<td><?=$tampil->besar_gaji?></td>
			</tr>
		<?php }?>
		</table>
</body>
</html>