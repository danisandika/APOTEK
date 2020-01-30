<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Role</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">Role</li>
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
              <h3 class="card-title">Ubah Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CRole/update') ?>" method="post">
    <div class="card-body">
      <div class="row form-group">
        <input type="hidden" name="IDRole" value="<?php echo $role->IDRole?>">
		<div class="col-md-3">
			<label for="nama">Nama Role *</label>
		</div>
		<div class="col-md-5">
     <input type="text" class="form-control" name="Deskripsi" required value="<?php echo $role->Deskripsi?>">
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
