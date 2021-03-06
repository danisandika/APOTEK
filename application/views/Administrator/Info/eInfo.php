<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Info Kesehatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Info Kesehatan</li>
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
              <h3 class="card-title">Edit Info Kesehatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CInfo/update') ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Judul *</label>
	 </div>
	 <div class="col-md-5">
     <input type="hidden" name="IDInfo" value="<?php echo $info->IDInfo?>">
     <input type="text" class="form-control" name="Judul" value="<?php echo $info->Judul?>" required>
    </div>
	</div>

    <div class="row form-group">
	<div class="col-md-3">
     <label for="nama">Deskripsi</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="textarea" placeholder="Place some text here" name="konten"
     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $info->Konten?></textarea>
     </div>
	 </div>

    <div class="row form-group">
     <div class="col-md-3">
	 <label for="nama">Foto</label>
	 </div>
	 <div class="col-md-5">
     <input type="hidden" class="form-control" name="old_gambar" value="<?php echo $info->gambar?>">
     <input type="file" class="form-control" name="gambar">
     </div>
	 </div>

     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Simpan</button>
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
