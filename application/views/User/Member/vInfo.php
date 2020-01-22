<!-- breadcrumb start-->
<section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Info Kesehatan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->


<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                  <?php foreach($info as $item) { ?>
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="<?php echo base_url('upload/info/'.$item->gambar)?>" alt="" width="1000" height="500">
                            <a href="#" class="blog_item_date">
                                <h3><?php echo $item->tanggal ?></h3>
                                <p><?php echo $item->bulan ?></p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="<?php echo site_url('CFBooking/detailInfo/'.$item->IDInfo)?>">
                                <h2><?php echo $item->Judul ?></h2>
                            </a>
                            <p><?php echo substr($item->Konten,0,500); echo "...";?></p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="far fa-user"></i><?php echo $item->Kategori ?></a></li>

                            </ul>
                        </div>
                    </article>
                  <?php } ?>


                </div>
            </div>

        </div>
    </div>
</section>
<!--================Blog Area =================-->
