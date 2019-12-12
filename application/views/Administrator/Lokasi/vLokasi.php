<?php $this->load->view('modal.php')?>
<?php $this->load->view('modal2.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Lokasi Penyimpanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Lokasi Penyimpanan</li>
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
          <h3 class="card-title">Data Lokasi Penyimpanan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CLokasi/tLokasi')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <table id="table2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Lokasi</th>
              <th>tempat Lokasi</th>
              <!--<th>Deskripsi</th>-->
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($lokasi as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Nama_Lokasi?></td>
                  <td><?php echo $s->tempatLokasi?></td>

                  <?php if($s->Status==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->Status==0) {
                    echo "<td><span class='badge bg-danger'>Nonaktif</span></td>";
                  } ?>
                  <td>
                  <a href="#" class="btn btn-primary btn-sm view_detail" relid="<?php echo $s->IDLokasi;  ?>"><span class="fas fa-eye"></span> | Details</a>
                  <a href="<?php echo site_url('CLokasi/edit/'.$s->IDLokasi) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Edit</a>
                  <?php if($s->Status==1){ ?>
                  <a onclick="deleteConfirm('<?php echo site_url('CLokasi/delete/'.$s->IDLokasi) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> | Delete</a>
                  <?php }else{ ?>
                  <a onclick="activeConfirm('<?php echo site_url('CLokasi/active/'.$s->IDLokasi) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-check"></span> | Active</a>
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


<!--Modal Details-->
<div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder">&nbsp;</i>Lokasi Details</h3>
      </div>
      <div class="modal-body">
        <h3>Data dari Lokasi Detail Penyimpanan</h3>
        <table class="table table-bordered table-striped">
            <tr>
              <td><b>Nama Lokasi</b></td>
              <td><p id="lokasi_nama"></p></td>
            </tr>
            <tr>
              <td><b>Tempat Lokasi</b></td><td><p id="lokasi_tempat"></p></td>
            </tr>
            <tr>
              <td><b>Deskripsi</b></td><td><p id="lokasi_deskripsi"></p></td>
            </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
