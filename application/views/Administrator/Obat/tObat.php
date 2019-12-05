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
  <form role="form" action="<?php echo site_url('CObat/tambah') ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row form-group">
	    <div class="col-md-3">
			<label for="nama">Nama Obat</label>
			<input type="hidden" name="IDObat">
		</div>
	  <div class="col-md-5">
		<input type="text" class="form-control" name="namaObat"required>
	  </div>
	</div>
	
	
    <div class="row form-group">
	<div class="col-md-3">
        <label for="IDJenis">Jenis Obat</label>
	</div>
	<div class="col-md-5">
		<select name="IDJenis" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php foreach ($jenis as $s) { ?>
        <option value="<?php echo $s->IDJenis ?>"><?php echo $s->namaJenis ?></option>
      <?php } ?>
			</select>
	</div>
	</div>

    <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Jumlah Obat</label>
	 </div>
	 <div class="col-md-5">
     <input type="jumlah" class="form-control" name="JumlahObat" required readonly value="0">
     </div>
	 </div>

     <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Keterangan</label>
	 </div>
	  <div class="col-md-8">
     <textarea class="form-control" rows="3" placeholder="" name="keterangan"></textarea>
	</div>
     </div>

    <div class="row form-group">
	<div class="col-md-3">
        <label for="IDLokasi">Lokasi</label>
	</div>
	<div class="col-md-5">
		<select name="IDLokasi" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
      <?php foreach ($lokasi as $s) { ?>
        <option value="<?php echo $s->IDLokasi ?>"><?php echo $s->Nama_Lokasi ?></option>
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
     <input type="number" class="form-control" name="harga" required >
     </div>
	 </div>


	 <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Kadaluwarsa</label>
	 </div>
	  <div class="col-md-5">
     <input type="date" class="form-control" name="Expired" required >
     </div>
	 </div>


	<div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Foto</label>
	 </div>
	 <div class="col-md-5">
     <input type="file" class="form-control" name="foto" required id="foto">
     </div>
	 </div>

	 <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-danger" onClick = "history.go(-1)">Cancel</button>
     </div>

</div>
</section>
</div>
     <!-- /.card -->
