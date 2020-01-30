<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <br>
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <blockquote class="generic-blockquote">
            <h3 class="mb-30">ID Pemesanan<br/></h3>
            <h4><?php echo $booking->IDBooking?></h4>
          </blockquote>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-sm-20">
          <h4><b>ID Pemesanan</b></h4>
          <h5><?php echo $booking->IDBooking?></h5>
          <h4><b>Tanggal Pemesanan</b></h4>
          <h5><?php echo $booking->dateBooking?></h5>
          <h4><b>Metode Pembayaran</b></h4>
          <h5>
            <?php
            echo $booking->MetodePembayaran;
            if($booking->MetodePembayaran=='Transfer')
            {
              if($booking->nama_bank=='BCA'){echo  "&nbsp;&nbsp;&nbsp;<span class='badge badge-pill badge-success'>BCA [6860148755]  &nbsp; A/n  &nbsp; PT.Mustika Farma</span> ";}
              elseif ($booking->nama_bank=='BNI'){echo  "&nbsp;&nbsp;&nbsp;<span class='badge badge-pill badge-success'>BNI [0095555554]  &nbsp; A/n  &nbsp; PT.Mustika Farma</span> ";}
              elseif ($booking->nama_bank=='BRI'){echo  "&nbsp;&nbsp;&nbsp;<span class='badge badge-pill badge-success'>BRI [050401000239300]  &nbsp; A/n  &nbsp; PT.Mustika Farma</span> ";}
              elseif ($booking->nama_bank=='Mandiri'){echo  "&nbsp;&nbsp;&nbsp;<span class='badge badge-pill badge-success'>Mandiri [0700001855555]  &nbsp; A/n  &nbsp; PT.Mustika Farma</span> ";}
            }
            ?>
          </h5>
           <h4><b>Status Pemesanan</b></h4>
           <h5><?php if($booking->statusBooking==1){echo "<span class='badge badge-pill badge-warning'>Menunggu Pembayaran</span>";}
           elseif($booking->statusBooking==2){echo "<span class='badge badge-pill badge-success'>Menunggu Diambil</span>";}
           elseif($booking->statusBooking==3){echo "<span class='badge badge-pill badge-danger'>Dibatalkan</span>";}
           elseif($booking->statusBooking==0){echo "<span class='badge badge-pill badge-info'>Selesai</span>";} ?></h5>
           <h4><b>Deskripsi</b></h4>
           <p><?php echo $booking->Deskripsi ?></p>
           <h4><b>Total Bayar</h4>
           <h3>Rp.<?php echo number_format($transaksi->totalBayar) ?></h3></b>
           <hr>

        </div>
      </div>
      <div class="progress-table-wrap" id="table2">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country">Produk Obat </div>
            <div class="visit">Kuantitas</div>
            <div class="percentage">Harga</div>
          </div>
          <?php $no=1; foreach($getdetail as $item) { ?>
          <div class="table-row">
            <div class="serial"><?php echo $no++; ?></div>
            <div class="country"><img src="<?php echo base_url('upload/obat/'.$item->Foto)?>" style="width:50px;height:50px;" alt="flag"><?php echo $item->namaObat ?></div>
            <div class="visit"><?php echo $item->jumlah ?>&nbsp;<?php echo $item->Satuan ?></div>
            <div class="percentage">
              Rp.<?php echo number_format($item->subTotal) ?>
            </div>
          </div>
        <?php } ?>
        <div class="table-row">
        <div class="serial"></div>
        <div class="country">
        <h3><b>Total</b></h3>
        </div>
        <div class="visit">
        </div>
        <div class="percentage">
         <h3><b>Rp.<?php echo number_format($transaksi->totalBayar)?></b3></b>
        </div>
      </div>
        </div>
      </div>
      <br>
      <hr>
       <a href="<?php echo site_url('CFBooking/index') ?>" class="genric-btn primary radius" ><span class="ti-plus"></span> Pesan Ulang</a>
       <?php if($booking->MetodePembayaran=='Transfer') { ?>
       <a href="<?php echo site_url('CFBooking/index3/'.$booking->IDBooking) ?>" class="genric-btn success radius"><span class="ti-money"></span> Konfirmasi Pembayaran</a>
       <?php } ?>
    </div>
  </div>
</div>
