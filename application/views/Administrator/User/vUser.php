
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CUser/tUser')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama </th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>Role</th>
			        <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($user as $s) { ?>
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
                    echo "<td><span class='badge bg-warning'>Manager</span></td>";
                  }
                  ?>
                  <td>
                  <a href="<?php echo site_url('CUser/edit/'.$s->IDUser) ?>" class="btn btn-success"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CUser/delete/'.$s->IDUser) ?>')" href="#" class="btn btn-danger"><span class="fas fa-trash"></span> | Delete</a>
                  </td>
              </tr>
            <?php } ?>

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
