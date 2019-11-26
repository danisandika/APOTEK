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
              <h3 class="card-title">Tambah Obat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CObat/tambah') ?>" method="post">
    <div class="card-body">
      <div class="form-group">
     <label for="nama">Nama Obat</label>
     <input type="hidden" name="IDObat">
     <input type="text" class="form-control" name="namaObat"required>
    </div>

    <div class="form-group">
        <label for="IDJenis">ID Jenis</label>										
		<select name="IDJenis" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php
			$connect = mysqli_connect("localhost", "root", "","prg5_apotek");
			mysqli_select_db($connect,"prg5_apotek");
			$sql = mysqli_query($connect,"SELECT IDJenis FROM jenisObat group by IDJenis ");
			if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_array($sql)) { ?>
			<option><?php echo $row ['IDJenis'] ?></option>
			<?php } ?>
			<?php } ?>
			</select>
	</div>

    <div class="form-group">
     <label for="nama">Jumlah Obat</label>
     <input type="jumlah" class="form-control" name="JumlahObat" required >
     </div>

     <div class="form-group">
     <label for="nama">Keterangan</label>
     <input type="text" class="form-control" name="keterangan" required >
     </div>

    <div class="form-group">
        <label for="IDLokasi">ID Lokasi</label>										
		<select name="IDLokasi" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php
			$connect = mysqli_connect("localhost", "root", "","prg5_apotek");
			mysqli_select_db($connect,"prg5_apotek");
			$sql = mysqli_query($connect,"SELECT IDLokasi FROM lokasi_penyimpanan group by IDLokasi ");
			if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_array($sql)) { ?>
			<option><?php echo $row ['IDLokasi'] ?></option>
			<?php } ?>
			<?php } ?>
			</select>
	</div>

	 
	<div class="form-group">
     <label for="nama">Satuan</label>
     <textarea class="form-control" rows="3" placeholder="" name="satuan"></textarea>
     </div>
	 
	 
	 <div class="form-group">
     <label for="nama">Harga</label>
     <textarea class="form-control" rows="3" placeholder="" name="harga"></textarea>
     </div>
	 
	 
	 <div class="form-group">
     <label for="nama">Expired</label>
     <input type="date" class="form-control" name="Expired" required >
     </div>
	 
	 
	<div class="form-group">
     <label for="nama">Foto</label>
     <textarea class="form-control" rows="3" placeholder="" name="foto"></textarea>
     </div>
	 
	 <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-danger">Cancel</button>
     </div>

</div>
</section>
</div>
     <!-- /.card -->
