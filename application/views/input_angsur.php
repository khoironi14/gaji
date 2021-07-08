<div class="container" style="background-color:white;">
	<div class="col-md-6">
		<center><h3>Form Input Angsuran Hutang</h3></center>
		  <form action="<?php echo base_url('Angsur/save_angsuran') ?>" method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Angsuran</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $k=1; $i=1; $a=1; $t=1; foreach ($angsur as $tampil) {
                    # code...
                ?>
                <tr>
                   
                    <input type="hidden" name="id_karyawan[<?=$k++?>]" value="<?=$tampil->id_karyawan?>">
                    <td><?=$tampil->nama_karyawan?></td>
                    <td><input type="text" name="angsuran[<?=$a++?>]" class="form-control" value="<?=$tampil->angsuran?>"></td>
                   <td><input type="date" name="tanggal[<?=$t++?>]" class="form-control" required=""></td>
                   <td><a href="#" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php }?>
          
            </tbody>
        </table>
    
     
      
        <button type="submit" class="btn btn-primary" name="simpan">Save </button>
        </form>
	</div>
</div>