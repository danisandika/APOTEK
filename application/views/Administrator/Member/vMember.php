
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Member</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama </th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>Role</th>
			  <th hidden ="true">Username</th>
			  <th hidden ="true">Password</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($user as $s) {
			  if( $s->IDRole == "3") {
			  ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Nama?></td>
                  <td><?php echo $s->Alamat?></td>
                  <td><?php echo $s->NoTelp?></td>
                  <td><?php echo $s->TglLahir?></td>
				          <td><?php echo $s->Email?></td>
                  <?php
                  if($s->IDRole == 1)
                  {
                    echo "<td><span class='badge bg-primary'>Admin</span></td>";
                  }
                  else if($s->IDRole == 2)
                  {
                    echo "<td><span class='badge bg-success'>Karyawan</span></td>";
                  }
                  else if($s->IDRole == 3)
                  {
                    echo "<td><span class='badge bg-warning'>Member</span></td>";
                  }
				  else if($s->IDRole == 3)
                  {
                    echo "<td><span class='badge bg-warning'>Manager</span></td>";
                  }
                  ?>
        				  <td hidden ="true"><?php echo $s->username?></td>
        				  <td hidden ="true"><?php echo $s->password?></td>
              </tr>
			  <?php }
			  } ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>
</div>
</section>
</div>
