<?php $this->load->view('modal.php')?>
<?php $this->load->view('modal2.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jenis Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Jenis Obat</li>
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
          <h3 class="card-title">Data Jenis Obat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CJenis/tJenisObat')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <br>
          <br>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th style="width:130px">Nama Jenis Obat</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th style="width:150px">Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($jenis as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->namaJenis?></td>
                  <td><?php echo $s->Deskripsi?></td>
                  <?php if($s->statusJenis==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->statusJenis==0) {
                    echo "<td><span class='badge bg-danger'>Nonaktif</span></td>";
                  } ?>
                  <td>
                  <a href="<?php echo site_url('CJenis/edit/'.$s->IDJenis) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Ubah</a>
                  <?php if($s->statusJenis==1){ ?>
                  <a onclick="deleteConfirm('<?php echo site_url('CJenis/delete/'.$s->IDJenis) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> | Hapus</a>
                  <?php }else{ ?>
                  <a onclick="activeConfirm('<?php echo site_url('CJenis/active/'.$s->IDJenis) ?>')" href="#" class="btn btn-info btn-sm"><span class="fas fa-check"></span> | Aktif</a>
                  <?php } ?>
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
