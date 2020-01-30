<!-- Start Align Area -->
<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <br><br><br>
      <h3 class="mb-30">Table Data Transaksi</h3>
      <div class="progress-table-wrap" id="table2">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country">ID Pesanan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metode</div>
            <div class="visit">Status</div>
            <div class="percentage">Aksi</div>
          </div>
          <?php $no=1; foreach($booking as $item) { ?>
          <div class="table-row">
            <div class="serial"><?php echo $no++; ?></div>
            <div class="country">
              <?php echo $item->IDBooking ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if($item->MetodePembayaran=='Tunai'){echo "<span class='badge badge-pill badge-success'>Bayar Ditempat</span>";}else{echo "<span class='badge badge-pill badge-primary'>Transfer</span>";} ?>
            </div>
            <div class="visit"><?php if($item->statusBooking==1){echo "<span class='badge badge-pill badge-warning'>Menunggu Pembayaran</span>";}elseif($item->statusBooking==2){echo "<span class='badge badge-pill badge-success'>Menunggu Diambil</span>";} ?></div>
            <div class="percentage">
              <a href="<?php echo site_url('CFBooking/detailsTransaksi/'.$item->IDBooking) ?>" class="genric-btn info circle arrow">Detail<span class="lnr lnr-arrow-right"></span></a>&nbsp;&nbsp;&nbsp;
              <?php if($item->MetodePembayaran=='Transfer'){ ?>
              <a href="<?php echo site_url('CFBooking/index3/'.$item->IDBooking) ?>" class="genric-btn primary circle arrow">Upload Transfer<span class="lnr lnr-arrow-right"></span></a>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
