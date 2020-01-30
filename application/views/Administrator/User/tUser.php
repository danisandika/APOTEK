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
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
           <label for="nama">Nama User *</label>
           <input type="text" class="form-control" name="Nama" required>
	    </div>

     <div class="form-group">
         <label for="role">Jenis Kelamin *</label>
         <br>
         <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki &nbsp;&nbsp;
         <input type="radio" name="jk" value="Perempuan" required> Perempuan
     </div>

    <div class="form-group">
           <label for="nama">Alamat</label>
           <textarea class="form-control" rows="3" placeholder="" name="Alamat"></textarea>
    </div>

    <div class="form-group">
           <label for="nama">No.Telp *</label>
           <input type="number" class="form-control" name="NoTelp" required>
	 </div>

	 <div class="form-group">
         <label for="nama">Tanggal Lahir</label>
         <input type="date" class="form-control" name="TglLahir" max="<?php echo date('Y-m-d') ?>" >
       </div>

     <div class="form-group">
         <label for="nama">Email *</label>
         <input type="email" class="form-control" name="Email" required>
	   </div>
 </div>

 <div class="col-md-6">
	 <div class="form-group">
     <label for="nama">Username *</label>
     <input type="text" class="form-control" name="Username" required>
	 </div>

	<div class="form-group">
    <label for="role">Role *</label>
		<select name="IDRole" class="form-control" style="width:100%;" required >
		<option value="" disabled selected>--- Select One ---</option>
      <?php foreach ($role as $s) { ?>
        <option value="<?php echo $s->IDRole ?>"><?php echo $s->Deskripsi ?></option>
      <?php } ?>
			</select>
	</div>

  <div class="form-group">
    <label for="role">Foto Profil</label>
    <br>
    <input type="file" name="foto" id="imgInp">
  </div>
  <div class="form-group">
    <div class="col-lg-5 col-md-6">
            <img src="#" alt="your image" id="blah" style="width:400px;height:400px;background-color:white;">
    </div>
  </div>

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
