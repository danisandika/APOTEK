<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Data Penjualan</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Penjualan</li>
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
        <h3 class="card-title ">Tambah Data Penjualan</h3>
      </div>
      <!-- /.card-header -->
      <br>
      <div class="card-body">
        <form class="" action="<?php echo site_url('CTransaksi/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
		<div class="col-sm-6">
		<div class="form-group">
		<div class="col-sm-12">
		<label>Resep Dokter</label>
		<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"> 
		<label>Ada </label>
		<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck">
		<label>Tidak Ada</label>
		</div>
		<div id="ifYes" style="visibility:hidden">
        <div class="row form-group">
		<div class="col-md-2">
		<label for="nama">Foto</label>
		</div>
		<div class="col-md-10">
		<input type="file" class="form-control" name="FotoResep" required id="foto">
		</div>
		</div>
		</div>
		</div>	
        <button type="submit" name="submit" class="btn btn-primary">Proses</button>
        </div>
		</div>
        </form>
		
        <hr>
        <table id="table2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jenis</th>
            <th>Status</th>
			<th>Harga</th>
			<th>Keterangan </th>
            <th style="width:50px;">Jumlah</th>
            <th>Add</th>
          </tr>
          </thead>

          <tbody>
            <?php $i=0?>
            <?php foreach ($datatran as $s) : ?>
            <tr>
                <td><?php $i++; echo $i?></td>
                <td><?php echo $s->namaObat?></td>
                <td><?php echo $s->namaJenis?></td>
                <?php if($s->Expired<date('Y-m-d')){echo "<td><span class='badge bg-danger'>Kadaluarsa</span></td>";}else{
                  echo "<td><span class='badge bg-primary'>Aman</span></td>";
                } ?>
				<td><?php echo $s->Harga?></td>
				<td><?php echo $s->Keterangan?></td>
                <td>
                  <input type="number" name="jumlah" id="<?php echo $s->IDObat;?>" value="1" class="jumlah form-control">
                </td>
                <td>
                  <button id="add_cartPenjualan" class="btn btn-success btn-block add_cartPenjualan" data-id_obat="<?php echo $s->IDObat;?>" data-namaobat="<?php echo $s->namaObat;?>" data-harga ="<?php echo $s->Harga;?>"><span class="fas fa-shopping-cart"></span></button>
                </td>
            </tr>
          <?php endforeach;?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>


<!-- Main content -->

  <div class="col-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Data Transaksi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="table_cartPenjualan" class="table table-bordered table-hover">
          <thead>
          <tr>

            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
          </thead>

          <tbody id="detail_cartPenjualan">
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

<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

}
</script>
