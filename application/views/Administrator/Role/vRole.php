<?php $this->load->view('modal.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Role User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Role User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CRole/tRole')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Jenis Obat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($role as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Deskripsi?></td>
                  <?php if($s->status==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->status==0) {
                    echo "<td><span class='badge bg-danger'>Nonaktif</span></td>";
                  } ?>
                  <td>
                  <a href="<?php echo site_url('CRole/edit/'.$s->IDRole) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CRole/delete/'.$s->IDRole) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> | Delete</a>
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
