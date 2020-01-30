

  <!-- footer part start-->
  <footer class="footer-area">
      <div class="footer section_padding">

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
  <!--Plugins SweetAlert2-->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>


  <script type="text/javascript">
      $(document).ready(function(){
          $('.add_cart_trans').click(function(){
            var id_obat       = $(this).data("id_obat");
            var namaobat      = $(this).data("namaobat");
            var jumlah        = $(this).data("jumlah");
            var harga         = $(this).data("harga");
            var jmlobat       = $(this).data("jmlobat");

            if(jmlobat<=0){
              Swal.fire(
	             'Gagal!',
	             'Stok Obat tidak mencukupi',
	             'error'
	           )
            }else{
              $.ajax({
                  url : "<?php echo site_url('CFBooking/add_cart');?>",
                  method : "POST",
                  data : {id_obat: id_obat, namaobat: namaobat, harga: harga, jumlah: jumlah},
                  success: function(data){
                      $('#detail_cart_trans').html(data);
                  }
              });
            }
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

  <script>
    $(function () {
      $("#table1").DataTable();
      $('#table2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>

  <script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
    }

    $("#imgInp").change(function() {
    readURL(this);
    });
  </script>


  <script type="text/javascript">
  function checkPassword() {
      var password = $("#password").val();
      var old_pass = $("#old_pass").val();

      if (old_pass != password ){
        $('#newpassword').prop('disabled', true);
        $('#repassword').prop('disabled', true);
        $("#divPasswordValidationResult").html("Password salah");
      }
        else{
        $("#divPasswordValidationResult").html("");
        $('#newpassword').prop('disabled', false);
        $('#repassword').prop('disabled', false);
      }
  }

  function checkPassword2() {
      var newpassword = $("#newpassword").val();
      var repassword = $("#repassword").val();

      if (newpassword != repassword ){
        $("#divvalresult").html("Password tidak sama");
      }
        else{
        $("#divvalresult").html("");
      }
  }

  $(document).ready(function () {
     $("#password").keyup(checkPassword);
     $("#repassword").keyup(checkPassword2);
  });

  </script>



</body>

</html>
