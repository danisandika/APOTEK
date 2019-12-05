<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lokasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Lokasi </li>
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
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Lokasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CLokasi/update') ?>" method="post">
    <div class="card-body">

	<div class="row form-group">
         <input type="hidden" name="IDLokasi" value="<?php echo $lokasi->IDLokasi?>">
	<div class="col col-md-3">
	 <label for="nama">Nama </label>
	 </div>
	 <div class="col col-md-5">
     <input type="text" class="form-control" name="namaLokasi" required value="<?php echo $lokasi->Nama_Lokasi?>">
	</div>
	</div>

    <div class="row form-group">
	<div class="col col-md-3">
   <label for="nama">tempat Lokasi </label>
   </div>
   <div class="col col-md-5">
   <input type="text" class="form-control" name="tempatLokasi" required value="<?php echo $lokasi->tempatLokasi?>">
   </div>
   </div>

    <div class="row form-group">
	<div class="col col-md-3">
     <label for="nama">Deskripsi</label>
	 </div>
	 <div class="col col-md-5">
     <textarea class="form-control" rows="3" placeholder="" name="Deskripsi"><?php echo $lokasi->Deskripsi?></textarea>
     </div>
	 </div>
   <div class="row form-group">
      <div class="col-md-3">
        <label for="nama">Status</label>
       </div>
        <div class="col-md-5">
          <input type="radio" name="status" value="1" <?php if($lokasi->Status==1){echo "checked";}else{echo "";}?> >Aktif
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input type="radio" name="status" value="0" <?php if($lokasi->Status==0){echo "checked";}else{echo "";}?> >Nonaktif
        </div>
   </div>

     <div class="card-footer">
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
