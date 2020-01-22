
<!-- breadcrumb start-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section_padding">
  <div class="container">
     <div class="row">
        <div class="col-lg-12 posts-list">
           <div class="single-post">
              <div class="feature-img">
                 <img class="img-fluid" src="<?php echo base_url('upload/info/'.$detailinfo->gambar)?>" alt="" width="1000" height="500">
              </div>
              <div class="blog_details">
                 <h2><?php echo $detailinfo->Judul ?>
                 </h2>
                 <ul class="blog-info-link mt-3 mb-4">
                    <li><a href="#"><i class="far fa-user"></i> <?php echo $detailinfo->Kategori ?></a></li>
                    <li><a href="#"><i class="far fa-comments"></i> <?php echo $detailinfo->tanggal ?></a></li>
                 </ul>
                 <p class="excert">
                    <?php echo $detailinfo->Konten ?>
                 </p>


              </div>
           </div>
           <div class="navigation-top">
              <div class="d-sm-flex justify-content-between text-center">

                 <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                 </ul>
              </div>
              <div class="navigation-area">
                 <div class="row">
                   <?php if(isset($prevdetailinfo)) { ?>
                    <div
                       class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                       <div class="thumb">
                          <a href="<?php echo site_url('CFBooking/detailInfo/'.$prevdetailinfo->IDInfo)?>">
                             <img class="img-fluid" src="<?php echo base_url('upload/info/'.$prevdetailinfo->gambar)?>" alt="" width="200" height="100">
                          </a>
                       </div>
                       <div class="arrow">
                          <a href="#">
                             <span class="lnr text-white ti-arrow-left"></span>
                          </a>
                       </div>
                       <div class="detials">
                          <p>Postingan Sebelumnya</p>
                          <a href="<?php echo site_url('CFBooking/detailInfo/'.$prevdetailinfo->IDInfo)?>">
                             <h4><?php echo $prevdetailinfo->Judul ?></h4>
                          </a>
                       </div>
                    </div>
                  <?php } ?>
                    <?php if(isset($nextdetailinfo)) { ?>
                    <div
                       class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                       <div class="detials">
                          <p>Postingan Selanjutnya</p>
                          <a href="<?php echo site_url('CFBooking/detailInfo/'.$nextdetailinfo->IDInfo)?>">
                             <h4><?php echo $nextdetailinfo->Judul ?></h4>
                          </a>
                       </div>
                       <div class="arrow">
                          <a href="<?php echo site_url('CFBooking/detailInfo/'.$nextdetailinfo->IDInfo)?>">
                             <span class="lnr text-white ti-arrow-right"></span>
                          </a>
                       </div>
                       <div class="thumb">
                          <a href="<?php echo site_url('CFBooking/detailInfo/'.$nextdetailinfo->IDInfo)?>">
                             <img class="img-fluid" src="<?php echo base_url('upload/info/'.$nextdetailinfo->gambar)?>" alt="" width="200" height="100">
                          </a>
                       </div>
                    </div>
                  <?php } ?>
                 </div>
              </div>
           </div>
           <div class="blog-author">
              <div class="media align-items-center">
                 <img src="<?php echo base_url('upload/profil/'.$detailinfo->poto)?>" alt="">
                 <div class="media-body">
                    <a href="#">
                       <h4><?php echo $detailinfo->name ?></h4>
                    </a>
                    <hr>
                    <p>Penulis Artikel Mustika Farma </p>
                 </div>
              </div>
           </div>

        </div>

     </div>
  </div>
</section>
<!--================Blog Area end =================-->
