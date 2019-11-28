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
  <form role="form" action="<?php echo site_url('CInfo/update') ?>" method="post">
    <div class="card-body">
      <div class="form-group">
     <label for="nama">Judul</label>
     <input type="hidden" name="IDInfo" value="<?php echo $info->IDInfo?>">
     <input type="text" class="form-control" name="Judul" value="<?php echo $info->Judul?>" required>
    </div>

    <div class="form-group">
     <label for="nama">Foto</label>
     <textarea class="form-control" rows="3" placeholder="" name="Foto"><?php echo $info->Foto?></textarea>
     </div>

    <div class="form-group">
     <label for="nama">Deskripsi</label>
     <input type="email" class="form-control" name="Deskripsi" required value="<?php echo $info->Deskripsi?>">
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
