
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Konfirmasi Pembayaran</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

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
  <div class="col-12">
	<form class="" action="<?php echo site_url('CTransaksi/tambah') ?>" method="post" enctype="multipart/form-data">

    <div class="card card-primary">
      <!-- /.card-header -->
      <br>
      <div class="card-body">
        <h3>Pembayaran</h3>
        <hr>
         <table class="table table-bordered table-hover">
          <div class="row form-group">
			<div class="col-md-3">
        <?php
          $totalBayar=0;
          foreach ($this->Transaksi->showCart() as $items) {
            $totalBayar = $totalBayar + $items->subTotal;
        }
        ?>
				<label for="nama">TOTAL</label>
				</div>
				<div class="col-md-5">
        <input type="text" class="form-control"  required value="Rp.<?php echo number_format($totalBayar) ?>">
				<input type="hidden" class="form-control CalculateMe" name='qty' id='qty' required value="<?php echo $totalBayar ?>">
				</div>
			</div>

		 <div class="row form-group">
			<div class="col-md-3">
				<label for="nama">TUNAI</label>
				</div>
				<div class="col-md-5">
				<input type="text" class="form-control CalculateMe"  name='price' id='price' required >
				</div>

			</div>

			 <div class="row form-group">
			<div class="col-md-3">
				<label for="nama">KEMBALI</label>
				</div>
				<div class="col-md-5">
				<input type="text" class="form-control CalculateMe" required name='total' id='total'>
				<span class=price></span>
				</div>
			</div>

			<button class="btn btn-primary" onclick="validasi();">Bayar</button>
      <div class="" style="visibility:hidden;">
        <input type="file" name="FotoResep" value="<?php echo $FotoResep ?>" >
      </div>

      </table>
      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
	</form>
</div>
</div>

<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
  function validasi()
  {
    alert();
    var firstInput = document.getElementById("qty").value;
    var secondInput = document.getElementById("price").value;
    if (qty>price)
    {
        alert("Uang Anda Kurang");
    }
    else if (qty<price or qty = price) {
        alert("Transaksi Berhasil");
    }

  }
</script>


<script type="text/javascript">
$('#qty, #price').on('input',function() {
    var qty = parseInt($('#qty').val());
    var price = parseFloat($('#price').val());
    $('#total').val((qty * price ? price - qty : 0).toFixed(0));
    //var total = parseFloat($('#total').val());
    //if (total < 0) {
      //alert("Uang Anda Kurang");
    //}
});
</script>
