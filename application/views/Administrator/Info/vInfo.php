<?php $this->load->view('modal.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<<<<<<< HEAD
            <h1>Data Info Kesehatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Info Kesehatan</li>
=======
            <h1>Data Informasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Informasi</li>
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
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
<<<<<<< HEAD
          <h3 class="card-title">Data Info Kesehatan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CSupplier/tSupplier')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
=======
          <h3 class="card-title">Data Informasi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CInfo/tInfo')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
<<<<<<< HEAD
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telepon</th>
=======
              <th>Judul</th>
              <th>Kategori</th>
<<<<<<< HEAD
              <th>Content</th>
              <th>Waktu Post</th>

=======
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
>>>>>>> 2175251ba3cbbe6f565e37d2184f1c9d61e595fc
              <th colspan="2">Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
<<<<<<< HEAD
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
=======
              <?php foreach ($info as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Judul?></td>
                  <td><?php echo $s->Kategori?></td>
                  <td><?php echo $s->Konten?></td>
                  <td><?php echo $s->waktuPost?></td>

                  <td>
<<<<<<< HEAD
                  <a href="<?php echo site_url('CJenis/edit/'.$s->IDInfo) ?>" class="btn btn-success"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CJenis/delete/'.$s->IDInfo) ?>')" href="#" class="btn btn-danger"><span class="fas fa-trash"></span> | Delete</a>
=======
                  <a href="<?php echo site_url('CInfo/edit/'.$s->IDInfo) ?>" class="btn btn-success"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CInfo/delete/'.$s->IDInfo) ?>')" href="#" class="btn btn-danger"><span class="fas fa-trash"></span> | Delete</a>
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
>>>>>>> 2175251ba3cbbe6f565e37d2184f1c9d61e595fc
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
