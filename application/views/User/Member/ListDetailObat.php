<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <br>
      <h3 class="mb-30"><?php echo $obat->namaObat ?></h3>
      <div class="row">
        <div class="col-md-3">
          <img src="<?php echo base_url('upload/obat/'.$obat->Foto)?>" alt="" class="img-fluid" >
        </div>
        <div class="col-md-9 mt-sm-20">
          <h4><b>Nama Obat</h4>
          <h5><?php echo $obat->namaObat?></h5>
          <h4><b>Jenis Obat</h4>
          <h5><?php echo $obat->namaJenis?></h5>
          <h4><b>Stok</h4>
          <h5>
          <?php
          if($obat->JumlahObat<=0){
            echo "<span class='badge badge-pill badge-danger'>Stok Habis</span>";}
          elseif ($obat->JumlahObat<=20) {
            echo "<span class='badge badge-pill badge-warning'>Stok Hampir Habis</span>";
          }else {
            echo "<span class='badge badge-pill badge-success'>Stok Tersedia</span>";
          }
           ?>
         </h5>
         <h4><b>Tanggal Kadaluarsa</h4>
         <h5><?php echo date('d F Y',strtotime($obat->Expired))?></h5>
         <h4><b>Deskripsi</h4>
         <p><?php echo $obat->Keterangan?></p>
         <h4><b>Harga</h4>
         <h5>Rp.<?php echo number_format($obat->Harga)?> / <?php echo $obat->Satuan?></h5>
         <br>
         <br>
         <hr>
         	<button class="genric-btn primary radius add_cart_trans" data-id_obat="<?php echo $obat->IDObat;?>" data-namaobat="<?php echo $obat->namaObat;?>" data-jumlah="1" data-harga="<?php echo $obat->Harga;?>"><span class="ti-shopping-cart"></span> Keranjang</button>
          <a href="<?php echo site_url('CFBooking/tTransaksi') ?>" class="genric-btn success radius"><span class="ti-money"></span> Lanjutkan Pembayaran</a>
        </div>
      </div>
    </div>
  </div>
</div>
