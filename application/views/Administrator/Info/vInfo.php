<?php $this->load->view('modal.php')?>
<?php $this->load->view('modal2.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          <h1>Data Informasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('CDashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Informasi</li>

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
          <h3 class="card-title">Data Informasi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo site_url('CInfo/tInfo')?>" class="btn btn-primary"><span class="fas fa-plus"></span> | Tambah</a>
          <br><br>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($info as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->Judul?></td>
                  <td><?php echo $s->Kategori?></td>
                  <?php if($s->status==1){echo "<td><span class='badge bg-primary'>Aktif</span></td>";}elseif ($s->status==0) {
                    echo "<td><span class='badge bg-danger'>Nonaktif</span></td>";
                  } ?>
                  <td>
                  <a href="#" class="btn btn-primary btn-sm view_info" relid="<?php echo $s->IDInfo;  ?>"><span class="fas fa-eye"></span> | Detail</a>
                  <a href="<?php echo site_url('CInfo/edit/'.$s->IDInfo) ?>" class="btn btn-success btn-sm"><span class="fas fa-edit"></span> | Ubah</a>
                  <?php if($s->status==1){ ?>
                  <a onclick="deleteConfirm('<?php echo site_url('CInfo/delete/'.$s->IDInfo) ?>')" href="#" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> | Hapus</a>
                  <?php }else{ ?>
                  <a onclick="activeConfirm('<?php echo site_url('CInfo/active/'.$s->IDInfo) ?>')" href="#" class="btn btn-info btn-sm"><span class="fas fa-check"></span> | Aktif</a>
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
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-info">&nbsp;</i>Informasi</h3>
      </div>
      <div class="modal-body">
        <h3>Data dari Info</h3>
        <table class="table table-bordered table-striped">
          <tr>
            <td rowspan="6" id="gambar"></td>
          </tr>
          <tr>
            <tr>
              <td><b>Judul</b></td>
              <td><p id="Judul"></p></td>
            </tr>
            <tr>
              <td><b>Kategori</b></td><td><p id="Kategori"></p></td>
            </tr>
            <tr>
              <td><b>Waktu Post</b></td><td><p id="waktuPost"></p></td>
            </tr>
            <tr>
              <td><b>Isi Konten</b></td><td><p id="Konten"></p></td>
            </tr>

          </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>
