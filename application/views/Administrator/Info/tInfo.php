<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Informasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Info</li>
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
            </div>
          <!-- /.card-header -->
          <form role="form" action="<?php echo site_url('CInfo/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row form-group">
			  <div class="col-md-3">
              <label for="">Judul *</label>
			  </div>
			  <div class="col-md-5">
              <input type="text" class="form-control" name="judul" required>
          </div>
		  </div>

            <div class="row form-group">
			<div class="col-md-3">
              <label for="">Kategori *</label>
			 </div>
			 <div class="col-md-5">
              <select name="kategori" class="form-control" required>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Obat">Obat</option>
              </select>
            </div>
			</div>


            <div class="row form-group">
			<div class="col-md-3">
              <label for="">Isi Info</label>
        			</div>
        			<div class="col-md-9">
                      <textarea class="textarea" placeholder="Place some text here" name="konten"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
        		  </div>
          <div class="row form-group">
		  <div class="col-md-3">
          <label for="">Gambar Info *</label>
		  </div>
		  <div class="col-md-5">
          <input type="file" class="form-control" name="gambar" id="gambar" required>
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
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
