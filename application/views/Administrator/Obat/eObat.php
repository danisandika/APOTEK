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
      <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Nama Obat</label>
	  </div>
	   <div class="col-md-5">
     <input type="hidden" name="IDObat" value="<?php echo $obat->IDObat?>">
     <input type="text" class="form-control" name="namaObat" value="<?php echo $obat->namaObat?>" required>
    </div>
	</div>

    <div class="row form-group">
	 <div class="col-md-3">
        <label for="IDJenis">ID Jenis</label>
	</div>
	 <div class="col-md-5">
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
	</div>

    <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Jumlah Obat</label>
	 </div>
	  <div class="col-md-5">
     <input type="jumlah" class="form-control" name="JumlahObat" required value="<?php echo $obat->JumlahObat?>">
     </div>
	 </div>

     <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Keterangan</label>
	 </div>
	  <div class="col-md-5">
     <input type="text" class="form-control" name="Keterangan" required value="<?php echo $obat->Keterangan?>">
     </div>
	 </div>

    <div class="row form-group">
	 <div class="col-md-3">
        <label for="IDLokasi">ID Lokasi</label>	
	</div>
	 <div class="col-md-5">
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
	</div>
	 
	<div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Satuan</label>
	 </div>
	  <div class="col-md-5">
	  <select name="Satuan" class="form-control" style="width:100;%" required>
		<option value="" disabled selected>--Pilih Satuan-- </option>
		<option value="Butir">Butir</option>
		<option value="Butir">Botol</option>
		<option value="Butir">Strip</option></select>    	
     </div>
	 </div>
	 
	 
	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Harga</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="form-control" rows="3" placeholder="" name="Harga"><?php echo $obat->Harga?></textarea>
     </div>
	 </div>
	 
	 
	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Expired</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="form-control" rows="1" placeholder="" name="Expired"><?php echo $obat->Expired?></textarea>
     </div>
	 </div>
	 
	 
	<div class="row form-group">
	<div class="col-md-3">
     <label for="nama">Foto</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="form-control" rows="3" placeholder="" name="Foto"><?php echo $obat->Foto?></textarea>
     </div>
	 </div>

     <div class="row card-footer">
       <button type="submit" class="btn btn-primary">Submit</button>
       <button type="reset" class="btn btn-danger" onClick = "history.go(-1)">Cancel</button>
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
