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
    width: 80%;
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
	<?php foreach ($slip as $tampil) {
		# code...
	 ?>
	 <h4 align="center">Slip Gaji CV DWI JASA LOGAM BOYOLALI</h4>
<table width="">	
<thead>	
<tr>	

<td>Nama</td><td><?=$tampil->nama_karyawan?>	</td><td>Upah/Jam</td><td><?=$tampil->gaji_perjam?>	</td>


</tr>
<tr>	
<td>Periode</td><td><?php echo date('d-m-Y',strtotime($_POST['periode_awal'])); ?> S/d <?php echo date('d-m-Y',strtotime($_POST['periode_akhir'])); ?>	</td><td>	Upah/lembur</td><td><?=$tampil->lembur?>	</td>

</tr>
<tr>	
<td>Jumlah Hari</td><td><?=$tampil->hari?> Hari	</td><td>Uang Makan</td><td><?=$makan=$gaji['besar']*$tampil->hari?>	</td>

</tr>
<tr>	
<td>Jumlah Jam Kerja</td><td><?=$tampil->jumlah_kerja?></td><td>Lembur</td><td><?=$tampil->jumlah_lembur?>	</td>

</tr>
<tr>
<td colspan="4" align="center">Upah RP</td>	
</tr>
<tr>	


</tr>
<tr>	
<td> Jam Kerja</td><td><?=$pokok=$tampil->jumlah_kerja*$tampil->gaji_perjam?></td><td>Lembur</td><td><?=$lembur=$tampil->jumlah_lembur*$tampil->lembur?>	</td>

</tr>
<tr><td colspan="2">Jumlah Upah</td><td colspan="2" align="right"><b><?php echo $upah=$makan+$pokok+$lembur; ?></b>	</td></tr>
<tr><td colspan="2">Potongan Pinjaman</td><td colspan="2" align="right"><b><?php echo $potongan=$tampil->jumlah_angsur; ?></b>   </td></tr>
<tr><td colspan="2">Total Upah</td><td colspan="2" align="right"><b><?php echo $upah-$potongan; ?></b>   </td></tr>
<tr><td colspan="2">Sisa Pinjaman</td><td colspan="2" align="right"><b><?php echo $tampil->sisa_hutang; ?></b>   </td></tr>
</thead>

</table>

<?php }?>

</body>
</html>