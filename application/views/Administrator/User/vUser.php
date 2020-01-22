<?php $this->load->view('modal.php')?>
<?php $this->load->view('modal2.php')?>
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
              <th>Email</th>
              <th>Username</th>
              <th>Status</th>
              <th>Role</th>
			  <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($user as $s) { if($s->IDRole != 3) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Nama?></td>
				          <td><?php echo $s->Email?></td>
                  <td><?php echo $s->username?></td>
                  <?php if($s->status==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->status==0) {
                    echo "<td><span class='badge bg-danger'>Nonaktif</span></td>";
                  } ?>
                  <?php
                  if($s->Deskripsi == "Admin")
                  {
                    echo "<td><span class='badge bg-primary'>Administrator</span></td>";
                  }
                  else if($s->Deskripsi == "Karyawan")
                  {
                    echo "<td><span class='badge bg-success'>Karyawan</span></td>";
                  }
                  else if($s->Deskripsi == "Manager")
                  {
                    echo "<td><span class='badge bg-warning'>Manager</span></td>";
                  }
                  else if($s->Deskripsi == "User")
                  {
                    echo "<td><span class='badge bg-info'>User</span></td>";
                  }
                  ?>
                  <td>
                  <a href="#" class="btn btn-primary btn-sm view_user" relid="<?php echo $s->IDUser;  ?>"><span class="fas fa-eye"></span> | Details</a>
                  <a href="<?php echo site_url('CUser/edit/'.$s->IDUser) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Edit</a>
                  <?php if($s->status==1){ ?>
                  <a onclick="deleteConfirm('<?php echo site_url('CUser/delete/'.$s->IDUser) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> | Delete</a>
                  <?php }else{ ?>
                  <a onclick="activeConfirm('<?php echo site_url('CUser/active/'.$s->IDUser) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-check"></span> | Active</a>
                  <?php } ?>
                  </td>
              </tr>
            <?php } }?>

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


<!--Modal Details-->
<div id="show_modal" class="modal fade" role="dialog" style="background: #000;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-user">&nbsp;</i>User Details</h3>
      </div>
      <div class="modal-body">
        <h3>Data dari Detail User</h3>
        <table class="table table-bordered table-striped">
          <tr>
            <td rowspan="9" id="profil"></td>
          </tr>
          <tr>
            <tr>
              <td><b>Nama</b></td>
              <td><p id="Nama"></p></td>
            </tr>
            <tr>
              <td><b>Jenis Kelamin</b></td><td><p id="jeniskelamin"></p></td>
            </tr>
            <tr>
              <td><b>Alamat</b></td><td><p id="Alamat"></p></td>
            </tr>
            <tr>
              <td><b>No.Telp</b></td><td><p id="NoTelp"></p></td>
            </tr>
            <tr>
              <td><b>Tanggal Lahir</b></td><td><p id="TglLahir"></p></td>
            </tr>
            <tr>
              <td><b>Email</b></td><td><p id="Email"></p></td>
            </tr>
            <tr>
              <td><b>Username</b></td><td><p id="username"></p></td>
            </tr>
          </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
