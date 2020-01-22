
<!--::doctor_part start::-->
<section class="doctor_part single_page_doctor_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section_tittle text-center">
                    <h2>Daftar Obat</h2>
                    <p>Daftar Obat </p>
                </div>
            </div>
        </div>

        <div class="row">
          <?php foreach($obat as $o){ ?>
            <div class="col-sm-6 col-lg-3">
                <div class="single_blog_item">
                    <div class="single_blog_img">
                        <img src="<?php echo base_url('upload/obat/'.$o->Foto)?>" alt="doctor" width="300px" height="300px">
                        <div class="social_icon">
                            <ul>
                                <li><button class="add_cart_trans" data-id_obat="<?php echo $o->IDObat;?>" data-namaobat="<?php echo $o->namaObat;?>" data-jumlah="1" data-harga="<?php echo $o->Harga;?>"><span class="ti-shopping-cart" ></span> </button></li>
                                <li><a href="<?php echo site_url('CFBooking/detailsObat/'.$o->IDObat) ?>"> <i class="ti-info"></i> </a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="single_text">
                        <div class="single_blog_text">
                            <a href="<?php echo site_url('CFBooking/detailsObat/'.$o->IDObat) ?>"><h3><?php echo $o->namaObat?></h3>
                            <p>Rp.<?php echo number_format($o->Harga)?></p></a>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
</section>
<!--::doctor_part end::-->
<!-- banner part start-->
