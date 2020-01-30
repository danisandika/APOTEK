<!-- Start Align Area -->
<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <br><br><br>
      <h3 class="mb-30">Riwayat Data Transaksi</h3>
      <div class="progress-table-wrap" id="table2">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country">ID Pesanan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metode</div>
            <div class="visit">Status</div>
            <div class="percentage">Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</div>
          </div>
          <?php $no=1; foreach($riwayat as $item) { ?>
          <div class="table-row">
            <div class="serial"><?php echo $no++; ?></div>
            <div class="country">
              <?php echo $item->IDBooking ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if($item->MetodePembayaran=='Tunai'){echo "<span class='badge badge-pill badge-success'>Bayar Ditempat</span>";}else{echo "<span class='badge badge-pill badge-primary'>Transfer</span>";} ?>
            </div>
            <div class="visit"><?php if($item->statusBooking==0){echo "<span class='badge badge-pill badge-primary'>Selesai</span>";}elseif($item->statusBooking==3){echo "<span class='badge badge-pill badge-danger'>Batal</span>";} ?></div>
            <div class="percentage">
              <?php echo $item->tgl ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php echo $item->total ?>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
