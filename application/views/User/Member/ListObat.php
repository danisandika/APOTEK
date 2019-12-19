<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-5">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>We are here for your care</h5>
                        <h1>Best Care &
                            Better Doctor</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.Risus cmodo viverra </p>
                        <a href="#" class="btn_2">Make an appointment</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner_img">
                    <img src="<?php echo base_url('medico/img/banner_img.png')?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
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
                                <li><a href="#"> <i class="ti-shopping-cart" ></i> </a></li>
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
