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
      <div class="form-group">
     <label for="nama">Nama Obat</label>
     <input type="hidden" name="IDObat">
     <input type="text" class="form-control" name="namaObat"required>
    </div>

    <div class="form-group">
        <label for="IDJenis">ID Jenis</label>
		<select name="IDJenis" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
			<?php foreach ($jenis as $s) { ?>
        <option value="<?php echo $s->IDJenis ?>"><?php echo $s->namaJenis ?></option>
      <?php } ?>
			</select>
	</div>

    <div class="form-group">
     <label for="nama">Jumlah Obat</label>
     <input type="jumlah" class="form-control" name="JumlahObat" required readonly value="0">
     </div>

     <div class="form-group">
     <label for="nama">Keterangan</label>
     <textarea class="form-control" rows="3" placeholder="" name="keterangan"></textarea>

     </div>

    <div class="form-group">
        <label for="IDLokasi">ID Lokasi</label>
		<select name="IDLokasi" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
      <?php foreach ($lokasi as $s) { ?>
        <option value="<?php echo $s->IDLokasi ?>"><?php echo $s->Nama_Lokasi ?></option>
      <?php } ?>
		</select>
	</div>


	<div class="form-group">
     <label for="nama">Satuan</label>
     <input type="text" class="form-control" name="satuan" required >
     </div>


	 <div class="form-group">
     <label for="nama">Harga</label>
     <input type="number" class="form-control" name="harga" required >
     </div>


	 <div class="form-group">
     <label for="nama">Expired</label>
     <input type="date" class="form-control" name="Expired" required >
     </div>


	<div class="form-group">
     <label for="nama">Foto</label>
     <input type="file" class="form-control" name="foto" required id="foto">
     </div>

	 <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-danger">Cancel</button>
     </div>

</div>
</section>
</div>
     <!-- /.card -->
