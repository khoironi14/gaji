<div class="container" style="background-color:white;">
<div class="row">
<div class="col-md-6">
 <form action="<?php echo base_url('Slip_gaji/laporan_gaji') ?>" method="post">
          <div class="form-group">
            <label>Periode Awal</label>
            <input type="date" name="tgl_awal" class="form-control">
          </div>
           <div class="form-group">
            <label>Periode Akhir</label>
            <input type="date" name="tgl_akhir" class="form-control">
          </div>
          
       
    
     <div class="form-group">
        <button type="submit" class="btn btn-primary" name="cari">Cari</button>
      </div>
       </form>
</div>
<div class="col-md-12">

<?php if (isset($_POST['cari'])) {
	# code...
 ?>

<table class="table table-bordered">
<thead>	
<tr>	
<th>Nama Karyawan</th>
<th>Total Gaji</th>
<th>Total Lembur</th>
<th>Total Uang Makan</th>
</tr>

</thead>
<tbody>	
	<?php $totalgaji=0; $totallem=0; $totalmakan=0; foreach ($laporan	 as $tampil) {
		# code...
	 ?>
<tr>	
<td><?=$tampil->nama_karyawan?></td>
<td><?=$g=$tampil->gaji_perjam*$tampil->jumlahkerja?></td>
<td><?=$l=$tampil->totallembur*$tampil->lembur?></td>
<td><?=$m=$tampil->uang_makan*$tampil->jumlah_hari?></td>
</tr>
<?php $totalgaji +=$g; $totallem +=$l; $totalmakan	+=$m; }?>
<tr> <td>Total Pengeluaran	</td> <td><?=$totalgaji	?></td>	<td><?=$totallem?></td> 	<td><?=$totalmakan?></td></tr>

</tbody>


	</table>
	<a href="<?php echo base_url('Slip_gaji/pdf_laporangaji/'.$_POST['tgl_awal'].'/'.$_POST['tgl_akhir'].'') ?>" target="blank" class="btn btn-danger">Cetak PDF</a>

<?php }?>

	</div>
	</div>
	</div>
	</div>