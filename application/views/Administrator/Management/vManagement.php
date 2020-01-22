
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Management Keuangan</li>
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
          <h3 class="card-title">Data Keuangan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CManagement/tManagement')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <br>
          <br>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Transaksi</th>
              <th>Deskripsi</th>
              <th>Debit</th>
              <th>Kredit</th>
              <th>Total</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($management as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->tanggalTransaksi?></td>
                  <td><?php echo $s->Deskripsi?></td>
                  <td><?php echo $s->Debit?></td>
                  <td><?php echo $s->Kredit?></td>
                  <td><?php echo $s->Total?></td>
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
