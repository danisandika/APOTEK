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
      <div class="card">
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
              <th>Status</th>
              <th>Jumlah Obat</th>
			  <th>Keterangan</th>
			  <th>Lokasi Penyimpanan</th>
              <th>Satuan</th>
			  <th>Harga</th>
			  <th>Expired</th>
			  <th>Foto</th>

			<th>Aksi</th>
            </tr>
            </thead>

            <tbody>
              <?php $i=0?>
              <?php foreach ($obat as $s) { ?>
              <tr>
                  <td><?php $i++; echo $i?></td>
                  <td><?php echo $s->namaObat?></td>
                  <td><?php echo $s->IDJenis?></td>
                  <td><?php echo $s->status?></td>
                  <td><?php echo $s->JumlahObat?></td>
				  <td><?php echo $s->Keterangan?></td>
				  <td><?php echo $s->IDLokasi?></td>
				  <td><?php echo $s->Satuan?></td>
				  <td><?php echo $s->Harga?></td>
				  <td><?php echo $s->Expired?></td>
				  <td><?php echo $s->Foto?></td>
				<td>
                  <a href="<?php echo site_url('CObat/edit/'.$s->IDObat) ?>" class="btn btn-success"><span class="fas fa-edit"></span> | Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('CObat/delete/'.$s->IDObat) ?>')" href="#" class="btn btn-danger"><span class="fas fa-trash"></span> | Delete</a>
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
