

  <!-- footer part start-->
  <footer class="footer-area">
      <div class="footer section_padding">
          <div class="container">
              <div class="row justify-content-between">
                  <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                      <a href="#" class="footer_logo"> <img src="<?php echo base_url('medico/img/logo.png');?>" alt="#"> </a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
                      <div class="social_logo">
                          <a href="#"><i class="ti-facebook"></i></a>
                          <a href="#"> <i class="ti-twitter"></i> </a>
                          <a href="#"><i class="ti-instagram"></i></a>
                          <a href="#"><i class="ti-skype"></i></a>
                      </div>
                  </div>
                  <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                      <h4>Quick Links</h4>
                      <ul>
                          <li><a href="#">About us</a></li>
                          <li><a href="#">Department</a></li>
                          <li><a href="#"> Online payment</a></li>
                          <li><a href="#">Careers</a></li>
                          <li><a href="#">Department</a></li>
                      </ul>
                  </div>
                  <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                      <h4>Explore</h4>
                      <ul>
                          <li><a href="#">In the community</a></li>
                          <li><a href="#">IU health foundation</a></li>
                          <li><a href="#">Family support </a></li>
                          <li><a href="#">Business solution</a></li>
                          <li><a href="#">Community clinic</a></li>
                      </ul>
                  </div>
                  <div class="col-xl-2 col-sm-6 col-md-6 single-footer-widget">
                      <h4>Resources</h4>
                      <ul>
                          <li><a href="#">Lights were season</a></li>
                          <li><a href="#"> Their is let wherein</a></li>
                          <li><a href="#">which given over</a></li>
                          <li><a href="#">Without given She</a></li>
                          <li><a href="#">Isn two signs think</a></li>
                      </ul>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                      <h4>Newsletter</h4>
                      <p>Seed good winged wherein which night multiply
                          midst does not fruitful</p>
                      <div class="form-wrap" id="mc_embed_signup">
                          <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">
                              <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                  required="" type="email">
                              <button class="click-btn btn btn-default text-uppercase"> <i class="ti-angle-right"></i>
                              </button>
                              <div style="position: absolute; left: -5000px;">
                                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                      type="text">
                              </div>

                              <div class="info"></div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="copyright_part">
          <div class="container">
              <div class="row align-items-center">
                  <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                  <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                      <a href="#"><i class="ti-facebook"></i></a>
                      <a href="#"> <i class="ti-twitter"></i> </a>
                      <a href="#"><i class="ti-instagram"></i></a>
                      <a href="#"><i class="ti-skype"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- footer part end-->

  <!-- jquery plugins here-->

  <script src="<?php echo base_url('medico/js/jquery-1.12.1.min.js');?>"></script>
  <!-- popper js -->
  <script src="<?php echo base_url('medico/js/popper.min.js');?>"></script>
  <!-- bootstrap js -->
  <script src="<?php echo base_url('medico/js/bootstrap.min.js');?>"></script>
  <!-- owl carousel js -->
  <script src="<?php echo base_url('medico/js/owl.carousel.min.js');?>"></script>
  <script src="<?php echo base_url('medico/js/jquery.nice-select.min.js');?>"></script>
  <!-- contact js -->
  <script src="<?php echo base_url('medico/js/jquery.ajaxchimp.min.js');?>"></script>
  <script src="<?php echo base_url('medico/js/jquery.form.js');?>"></script>
  <script src="<?php echo base_url('medico/js/jquery.validate.min.js');?>"></script>
  <script src="<?php echo base_url('medico/js/mail-script.js');?>"></script>
  <script src="<?php echo base_url('medico/js/contact.js');?>"></script>
  <script src="<?php echo base_url('wizard/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?php echo base_url('wizard/js/jquery.steps.js')?>"></script>
  <script src="<?php echo base_url('wizard/js/jquery-ui.min.js')?>"></script>
  <script src="<?php echo base_url('wizard/js/main.js')?>"></script>

  <!-- custom js -->
  <script src="<?php echo base_url('medico/js/custom.js');?>"></script>


  <script type="text/javascript">
      $(document).ready(function(){
          $('.add_cart_trans').click(function(){
              var id_obat       = $(this).data("id_obat");
              var namaobat      = $(this).data("namaobat");
              var jumlah        = $(this).data("jumlah");
              var harga         = $(this).data("harga");
              $.ajax({
                  url : "<?php echo site_url('CFBooking/add_cart');?>",
                  method : "POST",
                  data : {id_obat: id_obat, namaobat: namaobat, harga: harga, jumlah: jumlah},
                  success: function(data){
                      $('#detail_cart_trans').html(data);
                  }
              });
          });



          $('#detail_cart_trans').load("<?php echo site_url('CFBooking/load_cart');?>");


          $(document).on('click','.remove_cart',function(){
              var row_id=$(this).attr("id");
              $.ajax({
                  url : "<?php echo site_url('CFBooking/delete_cart');?>",
                  method : "POST",
                  data : {row_id : row_id},
                  success :function(data){
                      $('#detail_cart_trans').html(data);
                  }
              });
          });
      });
  </script>


  <!--Alert Sukses-->
  <?php if ($this->session->flashdata('globalmsgsuccess')):  ?>
  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: 'success',
      title: 'Data Sukses Diperbarui/Ditambahkan'
    })
    });
  </script>
  <?php endif; ?>

  <!--Alert Gagal-->
  <?php if ($this->session->flashdata('globalmsggagal')):  ?>
  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: 'error',
      title: 'Data Gagal Diperbarui/Ditambahkan'
    })
    });
  </script>
  <?php endif; ?>


</body>

</html>
