<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Penjualan</h1>
        </div>
        <div class="col-sm-6">
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
    <form class="" action="<?php echo site_url('CKonf_Transaksi/index') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
		<div class="col-sm-6">
		<div class="form-group">
		<div class="col-sm-6">

		<label>Resep Dokter</label>
    <div class="form-check">
		<input type="radio" onclick="javascript:yesnoCheck();" class="form-check-input" name="yesno" id="yesCheck"  required>
		<label>Ada </label>
    </div>
    <div class="form-check">
		<input type="radio" onclick="javascript:yesnoCheck();" class="form-check-input" name="yesno" id="noCheck"  required>
		<label>Tidak Ada</label>
    </div>
    </div>

		<div id="ifYes" style="visibility:hidden">
    <div class="form-group">
		<div class="col-md-2">
		<label for="nama">Foto</label>
		</div>
		<div class="col-md-10">
		<input type="file" class="form-control" name="FotoResep" id="foto">
		</div>
		</div>
		</div>
		</div>
    <button type="submit" name="submit" class="btn btn-primary">Proses</button>
    </div>
		</div>
    </form>

        <hr>
        <table id="table1" class="table table-bordered table-hover">
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
                <input type="hidden" id="<?= $s->IDObat?>db" value="<?= $s->JumlahObat?>">
                <td><?php $i++; echo $i?></td>
                <td><?php echo $s->namaObat?></td>
                <td><?php echo $s->namaJenis?></td>
                <?php if($s->Expired<date('Y-m-d')){echo "<td><span class='badge bg-danger'>Kadaluarsa</span></td>";}else{
                  echo "<td><span class='badge bg-primary'>Aman</span></td>";
                } ?>
          				<td>Rp.<?php echo number_format($s->Harga)?></td>
          				<td><?php echo $s->Keterangan?></td>
                <td>
                  <input type="number" name="jumlah" id="<?php echo $s->IDObat;?>" value="1" class="jumlah form-control">
                </td>
                <td>
                  <button onclick="check('<?= $s->IDObat?>')"  class="btn btn-success btn-block add_cartPenjualan" data-id_obat="<?php echo $s->IDObat;?>"
				          data-namaobat="<?php echo $s->namaObat;?>" data-harga ="<?php echo $s->Harga;?>"><span class="fas fa-shopping-cart"></span></button>
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
</div>
</section>
</div>


<script>
function myFunction() {
 Swal.fire(
  'Sukses!',
  'Data Dimasukan dikeranjang!',
  'success'
)
}
</script>
<script type="text/javascript">
    function check(id)
    {
        var searchtext = parseInt(document.getElementById(id).value);
        id+="db";
        var jumlah = parseInt(document.getElementById(id).value);
        console.log(searchtext);
        console.log(jumlah);
        if(searchtext<=jumlah)
        {
          Swal.fire(
           'Sukses!',
           'Data Dimasukan dikeranjang!',
           'success'
         )
        }
        else
        {
          Swal.fire({
            icon: 'error',
            title: 'Maaf',
            text: 'Stok tidak tersedia!',
        })
        }
    }
</script>

<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

}
</script>
