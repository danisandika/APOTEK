<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konfirmasi Pemesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Pemesanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Halaman ini untuk konfirmasi pemesanan. Pastikan data yang terdapat dalam pemesanan benar dan sesuai.
          </div>


          <!-- Main content -->
          <form class="" action="<?php echo site_url('CBooking/submit_transaksi') ?>" method="post">
          <input type="hidden" name="IDBooking" value="<?php echo $getbooking->IDBooking?>">
          <input type="hidden" name="totalBayar" value="<?php echo $transaksi->totalBayar?>">
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> PT.Mustika Farma
                  <small class="float-right"><?php echo date('d F Y'); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <hr>
            <!-- info row -->
            <div class="row invoice-info">

              <div class="col-sm-6 invoice-col">
                <table>
                  <tr>
                    <td style="width:200px;">ID Pemesanan</td>
                    <td><?php echo $getbooking->IDBooking?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Tanggal Pemesanan</td>
                    <td><?php echo date('d F Y', strtotime($getbooking->dateBooking))?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Metode Bayar</td>
                    <td><?php echo $getbooking->MetodePembayaran?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Nama Bank</td>
                    <td><?php echo $getbooking->nama_bank?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Status</td>
                    <?php
                    if($getbooking->statusBooking==1){echo "<td><span class='badge bg-warning'>Menunggu Konfirmasi</span></td>";}
                    if($getbooking->statusBooking==2){echo "<td><span class='badge bg-info'>Terkonfirmasi</span></td>";}
                     ?>
                  </tr>
                  <tr>
                    <td style="width:200px;">Deskripsi</td>
                    <td><?php echo $getbooking->Deskripsi?></td>
                  </tr>
                </table>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 invoice-col">
                <table>
                  <tr>
                    <td style="width:200px;">Pembeli</td>
                    <td><?php echo $getbooking->Nama?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Alamat</td>
                    <td><?php echo $getbooking->Alamat?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">No.Telepon</td>
                    <td><?php echo $getbooking->NoTelp?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Pembeli</td>
                    <td><?php echo $getbooking->Email?></td>
                  </tr>
                  <tr>
                    <td style="width:200px;">Username</td>
                    <td><?php echo $getbooking->username?></td>
                  </tr>
                </table>
              </div>
              <br>

            </div>
            <!-- /.row -->
            <br><br>
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto Obat</th>
                    <th>Nama Obat</th>
                    <th>Kuantitas</th>
                    <th>Harga/Item</th>
                    <th>SubTotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                  foreach($getdetailstrans as $g ) {?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><img src="<?php echo base_url('upload/obat/'.$g->Foto)?>" style="width:50px;height:50px;" alt="flag"></td>
                    <td><?php echo $g->namaObat ?></td>
                    <td><?php echo $g->jumlah?>&nbsp;<?php echo $g->Satuan ?></td>
                    <td>Rp.<?php echo number_format($g->harga) ?></td>
                    <td>Rp.<?php echo number_format($g->subTotal) ?></td>
                  </tr>
                  <?php }
                  $no++;
                  ?>
                  <tr>
                    <td colspan="5"><center><b>TOTAL</b></center></td>
                    <td>Rp.<?php echo number_format($transaksi->totalBayar) ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead"><b>Metode Pembayaran</b></p>
                <?php if($getbooking->MetodePembayaran=='Transfer'){ ?>
                <img src="<?php echo base_url('wizard/images/logo-bank.png')?>" alt="Visa" style="width:90px;height:60px;">
                <p class="lead"><b>Nama Bank</b></p>
                <p class="lead">
                <?php if($getbooking->nama_bank=='BCA'){?> BCA [6860148755]  &nbsp; A/n  &nbsp; PT.Mustika Farma</p>
                <?php }else if($getbooking->nama_bank=='BNI'){?> BNI [0095555554]  &nbsp; A/n  &nbsp; PT.Mustika Farma</p>
                <?php }else if($getbooking->nama_bank=='BRI'){?> BRI [050401000239300]  &nbsp; A/n  &nbsp; PT.Mustika Farma</p>
                <?php }else if($getbooking->nama_bank=='Mandiri'){?> Mandiri [0700001855555]  &nbsp; A/n  &nbsp; PT.Mustika Farma</p>
                <?php }}else{ ?>
                <img src="<?php echo base_url('wizard/images/uang-Rupiah.jpg')?>" alt="Mastercard"  style="width:90px;height:60px;" >
                <p class="lead"><b>Tunai</b></p>
                <?php } ?>

              </div>
              <!-- /.col -->
              <div class="col-6">
                <?php if($getbooking->MetodePembayaran=='Transfer'){ ?>
                <p class="lead"><b>Foto Bukti Transfer</b></p>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td rowspan="4">
                        <a href="<?php echo base_url('upload/transfer/'.$getbooking->FotoTransfer)?>" data-toggle="lightbox" data-title="sample 1 - white">
                          <img src="<?php echo base_url('upload/transfer/'.$getbooking->FotoTransfer)?>" class="img-fluid mb-2" alt="white sample" style="width:300px;height:300px;"/>
                        </a>
                        </td>
                    </tr>
                  </table>
                </div>
              <?php } ?>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                <?php
                if($getbooking->statusBooking==1 && $getbooking->MetodePembayaran=='Transfer'){ ?>
                  <button type="submit" name="submit" onclick="myFunction()" class="btn btn-success float-right" value='submit'><i class="far fa-credit-card"></i> Submit
                    Pembayaran
                  </button>
                <?php }elseif ($getbooking->statusBooking==2 && $getbooking->MetodePembayaran=='Transfer') {
                  echo "<button type='submit' name='confirmation' class='btn btn-success float-right' value='confirmation'><i class='far fa-credit-card'></i> Konfirmasi Pembayaran  </button>";
                } elseif ($getbooking->statusBooking==1 && $getbooking->MetodePembayaran=='Tunai') {
                  // code...
                  echo "<button type='submit' name='confirmation' class='btn btn-success float-right' value='confirmation'><i class='far fa-credit-card'></i> Konfirmasi Pembayaran  </button>";
                }?>

                <button type="button" class="btn btn-warning float-right" style="margin-right: 5px;" onClick = "history.go(-1)">
                  <i class="fas fa-undo"></i> Kembali
                </button>
                <?php if ($getbooking->statusBooking!=2 && $getbooking->MetodePembayaran!='Transfer') { ?>
                <a  class="btn btn-danger float-left" style="margin-right: 5px;" href="<?php echo site_url('CBooking/BatalBooking/'.$getbooking->IDBooking) ?>">
                  <i class="fas fa-stop"></i> Batal
                </a>
                <?php } ?>
              </div>
            </div>
          </div>

        </form>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
function myFunction() {
 Swal.fire(
  'Sukses!',
  'Data telah di simpan!',
  'success'
)
}
</script>
