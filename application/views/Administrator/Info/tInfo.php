<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
<<<<<<< HEAD
          <h1>Info Kesehatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Info Kesehatan</li>
=======
          <h1>Tambah Informasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Info</li>
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
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
<<<<<<< HEAD
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
=======
              <h3 class="card-title">Tambah Info</h3>
            </div>
          <!-- /.card-header -->
          <form role="form" action="<?php echo site_url('CInfo/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
              <label for="">Judul</label>
              <input type="text" class="form-control" name="judul" required>
          </div>

            <div class="form-group">
              <label for="">Kategori</label>
              <select name="kategori" class="form-control">
                <option value="Kesehatan">Kesehatan</option>
                <option value="Obat">Obat</option>
              </select>
            </div>


            <div class="form-group">
              <label for="">Isi Info</label>
              <textarea class="textarea" placeholder="Place some text here" name="konten"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
          <div class="form-group">
          <label for="">Gambar Info</label>
          <input type="file" class="form-control" name="gambar" id="gambar" required>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
       </div>
        </form>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
