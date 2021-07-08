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
	<h1 align="center">Data Gaji Pres/Cetak</h1>
<table width="100%">
			<tdead>
				<tr>
					<td colspan="">Nama Karyawan </td>

					
					<td colspan=""> </td><td colspan="">Hari Kerja </td>
					
				</tr>
			</tdead>
			<tbody>
				<?php foreach ($gaji as $tampil) {
					$id=$tampil->id_karyawan;
					$query=$this->db->query("SELECT * FROM `gaji_pres` where id_karyawan='$id'")->result();
				 ?>
				<tr>
					<td><?=$tampil->nama_karyawan?></td>
					
					
					<td><table >
						<tdead>
							<tr>
								<td>Nama Barang</td>
								<td>Jumlah Jadi</td>

					<td>Berat/Kg</td>
					<td>Berat Total</td>
					<td>Biaya Cetak</td>
					<td>Upah</td>
							</tr>
						</tdead>

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
							</tr>
							<?php }?>
						</tbody>
					</table></td>
				<td colspan=""><?=$tampil->hari_kerja?></td>
				
				</tr>
			<?php }?>
			</tbody>
		</table>
</body>
</html>