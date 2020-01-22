<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jenis Obat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Jenis Obat</li>
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
              <h3 class="card-title">Edit Jenis Obat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CJenis/update') ?>" method="post">
    <div class="card-body">
      <div class="row form-group">
        <input type="hidden" name="IDJenis" value="<?php echo $jenis->IDJenis?>">
     <div class="col-md-3">
	 <label for="nama">Nama Jenis Obat *</label>
     </div>
	 <div class="col-md-5">
	 <input type="text" class="form-control" name="namaJenis" required value="<?php echo $jenis->namaJenis?>">
    </div>
	</div>

    <div class="row form-group">
	<div class="col-md-3">
     <label for="nama">Deskripsi</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="form-control" rows="3" placeholder="" name="Deskripsi"><?php echo $jenis->Deskripsi?></textarea>
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
