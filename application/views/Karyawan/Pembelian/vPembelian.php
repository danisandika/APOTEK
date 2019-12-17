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
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title ">Konfirmasi Pembelian</h3>
      </div>
      <!-- /.card-header -->
      <br>
      <div class="card-body">
        <table id="table2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th style="width:10px;">No</th>
            <th style="width:50px;">ID Pembelian</th>
            <th>Supplier</th>
            <th>Obat</th>
            <th style="width:50px;">Jumlah</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>

          <tbody>
            <?php $i=0?>
            <?php foreach ($pembelian as $p) { ?>
            <tr>
                <td><?php $i++; echo $i?></td>
                <td><?php echo $p->IDPembelian?></td>
                <td><?php echo $p->NamaSupplier?></td>
                <td><?php echo $p->namaObat?></td>
                <td><?php echo $p->jumlah?>&nbsp;&nbsp;<?php echo $p->Satuan?></td>
                <td>Rp.<?php echo number_format($p->subTotal)?></td>
                <?php if($p->status==1){echo "<td><span class='badge bg-warning'>On The Way</span></td>";} ?>
                <td>
                <a href="javascript:;"
                data-id="<?php echo $p->IDObat?>"
                data-idp="<?php echo $p->IDPembelian?>"
                data-nama="<?php echo $p->namaObat?>"
                data-jumlah="<?php echo $p->jumlah?>"
                data-satuan="<?php echo $p->Satuan?>"
                data-toggle="modal" data-target="#edit-data-pembelian">
                <button data-toggle="modal" data-target="#ubah_data" class="btn btn-primary btn-sm"><span class="fas fa-check"></span> | Konfirmasi</button> </a>
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





      <!-- Modal Konfirmasi Obat-->
      <div class="modal fade" id="edit-data-pembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('CKonfirmasi/ubah_pembelian')?>" method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body">
              <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">Nama Obat</label>
                  <div class="row">
                  <div class="col-lg-12">
                      <input type="hidden" id="id" name="id">
                      <input type="hidden" id="idp" name="idp">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Obat" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                  <div class="row">
                  <div class="col-lg-8">
                      <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Obat" readonly>
                  </div>
                  <div class="col-lg-4">
                      <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Jumlah Obat" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">Kadaluarsa</label>
                  <div class="row">
                  <div class="col-lg-12">
                    <input type="date" name="tanggal" value="" id="tanggal" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
              <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
            </div>
            </form>
          </div>
        </div>
      </div>
