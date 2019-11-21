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
              <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <form role="form" action="<?php echo site_url('CUser/update') ?>" method="post">
    <div class="card-body">
      <div class="form-group">
     <label for="nama">Nama User</label>
     <input type="hidden" name="IDUser" value="<?php echo $user->IDUser?>">
     <input type="text" class="form-control" name="Nama" value="<?php echo $user->Nama?>" required>
    </div>

    <div class="form-group">
     <label for="nama">Alamat</label>
     <textarea class="form-control" rows="3" placeholder="" name="Alamat"><?php echo $user->Alamat?></textarea>
     </div>

    <div class="form-group">
     <label for="nama">Email </label>
     <input type="email" class="form-control" name="Email" required value="<?php echo $Email->Email?>">
     </div>

     <div class="form-group">
     <label for="nama">Nomor Telephone</label>
     <input type="text" class="form-control" name="NoTelp" required value="<?php echo $NoTelp->NoTelp?>">
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
