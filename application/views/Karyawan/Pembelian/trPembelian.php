<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pembelian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pembelian</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-7">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title ">Tambah Data Pembelian</h3>
      </div>
      <!-- /.card-header -->
      <br>
      <div class="card-body">
        <form class="" action="<?php echo site_url('CPembelian/tambah') ?>" method="post">
        <div class="form-group">
            <label for="role">Supplier</label>
            <select class="form-control" name="IDSupplier">
              <option value="" disabled selected>--Pilih Salah Satu--</option>
              <?php foreach($supplier as $s) { ?>
              <option value="<?php echo $s->IDSupplier ?>"><?php echo $s->NamaSupplier ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary">Proses</button>
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
            <th style="width:50px;">Jumlah</th>
            <th>Harga</th>
            <th>Add</th>
          </tr>
          </thead>

          <tbody>
            <?php $i=0?>
            <?php foreach ($data as $s) : ?>
            <tr>
                <td><?php $i++; echo $i?></td>
                <td><?php echo $s->namaObat?></td>
                <td><?php echo $s->namaJenis?></td>
                <?php if($s->Expired<date('Y-m-d')){echo "<td><span class='badge bg-danger'>Kadaluarsa</span></td>";}else{
                  echo "<td><span class='badge bg-primary'>Aman</span></td>";
                } ?>
                <td>
                  <input type="number" name="jumlah" id="<?php echo $s->IDObat;?>" value="1" class="jumlah form-control">
                </td>
                <td>
                  <input type="number" name="harga" id="H<?php echo $s->IDObat;?>" value="0" class="harga form-control">
                </td>
                <td>
                  <button class="btn btn-success btn-block add_cart" data-id_obat="<?php echo $s->IDObat;?>" data-namaobat="<?php echo $s->namaObat;?>"><span class="fas fa-shopping-cart"></span></button>
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

  <div class="col-5">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Data Pembelian</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
          <tr>

            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
          </thead>

          <tbody id="detail_cart">
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
