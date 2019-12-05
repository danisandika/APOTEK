<?php $this->load->view('modal.php')?>
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
          <a href="<?php echo site_url('CObat/tObat')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Obat</th>
              <th>Jenis Obat</th>
              <th>Lokasi</th>
              <th>Jumlah Obat</th>
      			  <th>Harga</th>
              <th>Status</th>
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
        				  <td>Rp.<?php echo round($s->Harga)?></td>
                  <?php if($s->statusObat==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->statusObat==0) {
                    echo "<td><span class='badge bg-danger '>Nonaktif</span></td>";
                  } ?>
        				  <td>
                  <a href="#" class="btn btn-primary btn-sm view_obat" relid="<?php echo $s->IDObat;  ?>"><span class="fas fa-eye"></span> | Details</a>
                  <a href="<?php echo site_url('CObat/edit/'.$s->IDObat) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CObat/delete/'.$s->IDObat) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> | Delete</a>
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




<!--Modal Details-->
<div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-capsules">&nbsp;</i>Obat Details</h3>
      </div>
      <div class="modal-body">
        <h3>Data dari Detail Obat</h3>
        <table class="table table-bordered table-striped">
          <tr>
            <td rowspan="8" id="foto_obat"></td>
          </tr>
          <tr>
            <tr>
              <td><b>Nama Obat</b></td>
              <td><p id="nama_obat"></p></td>
            </tr>
            <tr>
              <td><b>jumlah</b></td><td><p id="jumlah_obat"></p></td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td><td><p id="keterangan_obat"></p></td>
            </tr>
            <tr>
              <td><b>Satuan</b></td><td><p id="satuan_obat"></p></td>
            </tr>
            <tr>
              <td><b>Harga</b></td><td><p id="harga_obat"></p></td>
            </tr>
            <tr>
              <td><b>Kadaluarsa</b></td><td><p id="kadaluarsa_obat"></p></td>
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
