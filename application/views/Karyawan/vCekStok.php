<?php $this->load->view('modal3.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
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
          <h3 class="card-title">Data Obat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Obat</th>
              <th>Jenis Obat</th>
              <th>Lokasi</th>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Kadaluarsa</th>
      			  <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($obat as $s ) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->namaObat?></td>
                  <td><?php echo $s->namaJenis?></td>
                  <td><?php echo $s->Nama_Lokasi?></td>
                  <td><?php echo $s->JumlahObat?></td>
                  <?php if ($s->JumlahObat<=0){echo "<td><span class='badge bg-danger '>Habis</span></td>";
                  } elseif($s->JumlahObat<10){echo "<td><span class='badge bg-warning'>Hampir Habis</span></td>";
                  } else{echo "<td><span class='badge bg-primary '>Tersedia</span></td>";
                  } ?></td>
                  <?php if(date('Y-m-d') < $s->Expired) {echo "<td><span class='badge bg-primary'>Aman Konsumsi</span></td>";}else{echo "<td><span class='badge bg-danger'>Kadaluarsa</span></td>";}?>
        				  <td>
                  <?php if($s->statusObat==1){ ?>
                  <a onclick="BuangConfirm('<?php echo site_url('CStok/deleteStok/'.$s->IDObat) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> | Buang</a>
                <?php } ?>
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
