<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pemesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pemesanan</li>
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
        <h3 class="card-title ">Konfirmasi Pemesanan</h3>
      </div>
      <!-- /.card-header -->
      <br>
      <div class="card-body">
        <table id="table1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th style="width:10px;">No</th>
            <th style="width:50px;">ID Pemesanan</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>

          <tbody>
            <?php $i=0?>
            <?php foreach ($booking as $p) { ?>
            <tr>
                <td><?php $i++; echo $i?></td>
                <td><?php echo $p->IDBooking?></td>
                <td><?php echo $p->dateBooking?></td>
                <td><?php echo $p->Nama?></td>
                <td><?php echo $p->MetodePembayaran?></td>
                  <?php
                  if($p->statusBooking==1){echo "<td><span class='badge bg-warning'>Menunggu Konfirmasi</span></td>";}
                  if($p->statusBooking==2){echo "<td><span class='badge bg-info'>Terkonfirmasi</span></td>";}
                   ?>
                <td>
                  <a href="<?php echo site_url('CBooking/detailBooking/'.$p->IDBooking)?>" class="btn btn-info btn-sm"><span class="fas fa-check">| Konfirmasi</span> </a>

                </td>

                <!--<a href="#" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Edit</a>-->

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
</div>
