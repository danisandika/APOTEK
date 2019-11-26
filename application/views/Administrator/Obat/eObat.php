<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Obat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Obat</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Obat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
	<form role="form" action="<?php echo site_url('CObat/update') ?>" method="post">
    <div class="card-body">
      <div class="form-group">
     <label for="nama">Nama Obat</label>
     <input type="hidden" name="IDObat" value="<?php echo $obat->IDObat?>">
     <input type="text" class="form-control" name="namaObat" value="<?php echo $obat->namaObat?>" required>
    </div>

    <div class="form-group">
        <label for="IDJenis">ID Jenis</label>										
		<select name="IDJenis" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php
			$connect = mysqli_connect("localhost", "root", "","prg5_apotek");
			mysqli_select_db($connect,"prg5_apotek");
			$sql = mysqli_query($connect,"SELECT namaJenis FROM jenisObat group by IDJenis ");
			if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_array($sql)) { ?>
			<option><?php echo $row ['namaJenis'] ?></option>
			<?php } ?>
			<?php } ?>
			</select>
	</div>

    <div class="form-group">
     <label for="nama">Jumlah Obat</label>
     <input type="jumlah" class="form-control" name="JumlahObat" required value="<?php echo $obat->JumlahObat?>">
     </div>

     <div class="form-group">
     <label for="nama">Keterangan</label>
     <input type="text" class="form-control" name="keterangan" required value="<?php echo $obat->keterangan?>">
     </div>

    <div class="form-group">
        <label for="IDLokasi">ID Lokasi</label>										
		<select name="IDLokasi" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php
			$connect = mysqli_connect("localhost", "root", "","prg5_apotek");
			mysqli_select_db($connect,"prg5_apotek");
			$sql = mysqli_query($connect,"SELECT Nama_Lokasi FROM lokasi_penyimpanan group by IDLokasi ");
			if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_array($sql)) { ?>
			<option><?php echo $row ['Nama_Lokasi'] ?></option>
			<?php } ?>
			<?php } ?>
			</select>
	</div>

	 
	<div class="form-group">
     <label for="nama">Satuan</label>
     <textarea class="form-control" rows="3" placeholder="" name="satuan"><?php echo $obat->satuan?></textarea>
     </div>
	 
	 
	 <div class="form-group">
     <label for="nama">Harga</label>
     <textarea class="form-control" rows="3" placeholder="" name="harga"><?php echo $obat->harga?></textarea>
     </div>
	 
	 
	 <div class="form-group">
     <label for="nama">Expired</label>
     <textarea class="form-control" rows="3" placeholder="" name="Expired"><?php echo $obat->expired?></textarea>
     </div>
	 
	 
	<div class="form-group">
     <label for="nama">Foto</label>
     <textarea class="form-control" rows="3" placeholder="" name="foto"><?php echo $obat->foto?></textarea>
     </div>

     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Submit</button>
       <button type="reset" class="btn btn-danger">Cancel</button>
     </div>
    </div>
     </form>
     </div>
   </div>
  </div>
</div>
</section>
</div>
     <!-- /.card -->
