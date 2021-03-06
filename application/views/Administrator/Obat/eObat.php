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
              <h3 class="card-title">Ubah Obat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
	<form role="form" action="<?php echo site_url('CObat/update') ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Nama Obat *</label>
	  </div>
	   <div class="col-md-5">
     <input type="hidden" name="IDObat" value="<?php echo $obat->IDObat?>">
     <input type="text" class="form-control" name="namaObat" value="<?php echo $obat->namaObat?>" required>
    </div>
	</div>

    <div class="row form-group">
	 <div class="col-md-3">
        <label for="IDJenis">Jenis Obat *</label>
	</div>
	 <div class="col-md-5">
		<?php $jenisData = $obat->IDJenis; ?>
		<select name="IDJenis" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Jenis Obat ---</option>
			<?php foreach ($jenis as $s) {
			 $jenisValue = $s->IDJenis;
			?>
            <option <?php if ($jenisData == $jenisValue) echo "selected" ?> value="<?php echo $jenisValue ?>" >Jenis <?php echo $s->namaJenis ?></option>
		<?php } ?>
		</select>
	</div>
	</div>

    <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Jumlah Obat</label>
	 </div>
	  <div class="col-md-5">
     <input type="jumlah" class="form-control" name="JumlahObat" value="<?php echo $obat->JumlahObat?>" readonly>
     </div>
	 </div>

     <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Keterangan</label>
	 </div>
	  <div class="col-md-5">
     <input type="text" class="form-control" name="Keterangan" value="<?php echo $obat->Keterangan?>">
     </div>
	 </div>

    <div class="row form-group">
	 <div class="col-md-3">
        <label for="IDLokasi">Lokasi Obat *</label>
	</div>
	 <div class="col-md-5">
		<?php $lokasiData = $obat->IDLokasi; ?>
		<select name="IDLokasi" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Lokasi Obat ---</option>
			<?php foreach ($lokasi as $l) {
			 $lokasiValue = $l->IDLokasi;
			?>
            <option <?php if ($lokasiData == $lokasiValue) echo "selected" ?> value="<?php echo $lokasiValue ?>" >Lokasi <?php echo $l->Nama_Lokasi ?></option>
		<?php } ?>
		</select>
	</div>
	</div>

	<div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Satuan *</label>
	 </div>
	  <div class="col-md-5">
	  <select name="Satuan" class="form-control" style="width:100;%" required>
		<option value="" disabled selected>-- Pilih Satuan -- </option>
		<option value="Butir">Butir</option>
		<option value="Botol">Botol</option>
		<option value="Strip">Strip</option>
    <option value="Pcs">Pcs</option>
    </select>
     </div>
	 </div>


	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Harga *</label>
	 </div>
	 <div class="col-md-5">
     <input type="number" class="form-control" placeholder="" name="Harga" value="<?php echo round($obat->Harga)?>" required/>
     </div>
	 </div>


	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Expired</label>
	 </div>
	 <div class="col-md-5">
     <input type="date" class="form-control" rows="1" placeholder="" name="Expired" value="<?php echo $obat->Expired?>">
     </div>
	 </div>


	<div class="row form-group">
	<div class="col-md-3">
     <label for="nama">Foto </label>
	 </div>
	 <div class="col-md-5">
     <input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>" type="file" name="foto" />
		 <input type="hidden" name="old_foto" value="<?php echo $obat->Foto ?>" />
     </div>
	 </div>


     <div class="row card-footer">
       <button type="submit" class="btn btn-primary">Simpan</button>
       &nbsp;&nbsp;
       <button type="reset" class="btn btn-danger" onClick = "history.go(-1)">Batal</button>
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
