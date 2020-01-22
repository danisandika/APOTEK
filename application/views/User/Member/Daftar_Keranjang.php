<!-- Start Align Area -->
<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <br><br><br>
      <h3 class="mb-30">Table Data Keranjang</h3>
      <div class="progress-table-wrap" id="table2">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country">Nama Obat&nbsp;&nbsp;|&nbsp;&nbsp;Jumlah </div>
            <div class="visit">Harga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;Sub Total </div>
            <div class="percentage">Aksi</div>
          </div>
          <?php $no=1; foreach($daftar_keranjang as $item) { ?>
          <div class="table-row">
            <div class="serial"><?php echo $no++; ?></div>
            <div class="country">
              <?php echo $item->nama_obat ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
              <?php echo $item->jumlah ?>
            </div>
            <div class="visit">
              Rp.<?php echo number_format($item->harga) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
              Rp.<?php echo number_format($item->subTotal) ?></div>
            <div class="percentage">
              <a href="<?php echo site_url('CFBooking/delete_keranjang/'.$item->id_obat) ?>" class="genric-btn danger circle arrow">Batal<span class="lnr lnr-arrow-right"></span></a>&nbsp;&nbsp;&nbsp;

            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <br>
      <br>
      <hr>
      <a href="<?php echo site_url('CFBooking/tTransaksi') ?>" class="genric-btn success radius"><span class="ti-money"></span> Lanjutkan Pembayaran</a>
    </div>
  </div>
</div>
