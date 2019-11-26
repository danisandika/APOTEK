
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
          <h3 class="card-title">Data Supplier</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CSupplier/tSupplier')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telepon</th>
              <th colspan="2">Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($supplier as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->NamaSupplier?></td>
                  <td><?php echo $s->AlamatSupplier?></td>
                  <td><?php echo $s->EmailSupplier?></td>
                  <td><?php echo $s->noTelp?></td>
                  <td>
                  <a href="<?php echo site_url('CSupplier/edit/'.$s->IDSupplier) ?>" class="btn btn-success"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CSupplier/delete/'.$s->IDSupplier) ?>')" href="#" class="btn btn-danger"><span class="fas fa-trash"></span> | Delete</a>
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
