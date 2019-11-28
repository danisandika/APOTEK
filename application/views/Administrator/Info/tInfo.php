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
              <h3 class="card-title">Tambah Info Kesehatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CSupplier/tambah') ?>" method="post">
    <div class="card-body">
      <div class="form-group">
     <label for="nama">Nama Supplier</label>
     <input type="text" class="form-control" name="namaSupplier" required>
    </div>

    <div class="form-group">
     <label for="nama">Alamat</label>
     <textarea class="form-control" rows="3" placeholder="" name="alamatSupplier"></textarea>
     </div>

    <div class="form-group">
     <label for="nama">Email Supplier</label>
     <input type="email" class="form-control" name="emailSupplier" required>
     </div>

     <div class="form-group">
     <label for="nama">Nomor Telephone</label>
     <input type="text" class="form-control" name="telpSupplier" required>
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
