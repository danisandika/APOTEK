<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active">User</li>
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
              <h3 class="card-title">Tambah User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CUser/tambah') ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row form-group">
	  <div class="col-md-3">
     <label for="nama">Nama User</label>
	 </div>
	 <div class="col-md-5">
     <input type="text" class="form-control" name="Nama" required>
    </div>
	</div>

    <div class="row form-group">
	<div class="col-md-3">
     <label for="nama">Alamat</label>
	 </div>
	 <div class="col-md-5">
     <textarea class="form-control" rows="3" placeholder="" name="Alamat"></textarea>
     </div>
	 </div>

    <div class="row form-group">
	<div class="col-md-3">
     <label for="nama">No Telp</label>
	 </div>
	 <div class="col-md-5">
     <input type="text" class="form-control" name="NoTelp" required>
     </div>
	 </div>

	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Tanggal Lahir</label>
	 </div>
	 <div class="col-md-5">
     <input type="date" class="form-control" name="TglLahir" required>
     </div>
	 </div>

     <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Email </label>
	 </div>
	 <div class="col-md-5">
     <input type="email" class="form-control" name="Email" required>
     </div>
	 </div>

	 <div class="row form-group">
	 <div class="col-md-3">
     <label for="nama">Username </label>
	 </div>
	 <div class="col-md-5">
     <input type="text" class="form-control" name="Username" required>
     </div>
	 </div>

	 <!-- <div class="form-group">
     <label for="nama">Password </label>
     <input type="password" class="form-control" name="Password" required>
     </div> -->

	<div class="row form-group">
	<div class="col-md-3">
    <label for="role">Role</label>
	</div>
	<div class="col-md-5">
		<select type="text" name="IDRole" class="form-control" style="width: 100%;" required>
			<option value="null" disabled selected>-- Role --</option>
			<?php
				foreach ($role as $j) {
					if ($j->status=="1"){ ?>
						<option value="<?php echo $j->IDRole ?>" >Role <?php echo $j->Deskripsi ?></option>
					
					<?php }
				} ?>
		</select>
	</div>
	</div>
	
  <div class="row form-group">
  <div class="col-md-3">
    <label for="role">Jenis Kelamin</label>
    <br>
	</div>
	<div class="col-md-3">
    <input type="radio" name="jk" value="Laki-Laki" > Laki-Laki<br>
    <input type="radio" name="jk" value="Perempuan" > Perempuan<br>
  </div>
  </div>
  
  <div class="row form-group">
  <div class="col-md-3">
    <label for="role">Foto Profil</label>
    <br>
	</div>
	<div class="col-md-5">
    <input type="file" name="foto">
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
