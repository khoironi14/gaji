<!DOCTYPE html>
<html>
<head>
 <title>  </title>
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
<h2 align="center">Laporan Gaji Karyawan Harian </h2>
<h3 align="center">CV DWI JASA LOGAM BOYOLALI</h3>



<table class="table table-bordered">
<thead> 
<tr>  
<td>Nama Karyawan</td>
<td>Total Gaji</td>
<td>Total Lembur</td>
<td>Total Uang Makan</td>
</tr>

</thead>
<tbody> 
  <?php $totalgaji=0; $totallem=0; $totalmakan=0; foreach ($laporan  as $tampil) {
    # code...
   ?>
<tr>  
<td><?=$tampil->nama_karyawan?></td>
<td><?=$g=$tampil->gaji_perjam*$tampil->jumlahkerja?></td>
<td><?=$l=$tampil->totallembur*$tampil->lembur?></td>
<td><?=$m=$tampil->uang_makan*$tampil->jumlah_hari?></td>
</tr>
<?php $totalgaji +=$g; $totallem +=$l; $totalmakan  +=$m; }?>
<tr> <td>Total Pengeluaran  </td> <td><?=$totalgaji ?></td> <td><?=$totallem?></td>   <td><?=$totalmakan?></td></tr>

</tbody>


  </table>
  



</body>
</html>