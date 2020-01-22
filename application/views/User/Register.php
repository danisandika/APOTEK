<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register | Mustika Farma</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('Loginv1/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/vendor/animate/animate.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Loginv1/css/main.css')?>">
	<!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/dist/img/logo1.png')?>" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="<?php echo site_url('CFLogin/Register_Member')?>" method="post">
					<span class="login100-form-title">
						Register Member
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username is Required">
						<input class="input100" type="text" name="nama" placeholder="Nama" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="notelp" placeholder="No Telepon" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "Valid Username is Required">
						<input class="input100" type="email" name="email" placeholder="Email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope-open" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "Valid Username is Required">
            <select class="input100" name="jeniskelamin">
              <option value="" disabled selected>--Jenis Kelamin--</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-venus-mars" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "Valid Username is Required">
            <label for="nama" hidden>Username *</label>
						<input class="input100" type="text" name="Username" placeholder="Username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Daftar
						</button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo site_url('CFLogin/index') ?>">
							Login
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>

		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url('Loginv1/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('Loginv1/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('Loginv1/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('Loginv1/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('Loginv1/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('Loginv1/js/main.js')?>"></script>

  <?php if ($this->session->flashdata('MsgregistSukses')):  ?>
  <script type="text/javascript">
    $(function() {
            Swal.fire(
             'Sukses!',
             'Pendaftaran Berhasil!',
             'success'
           )
    });
  </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('MsgregistGagal')):  ?>
		<script type="text/javascript">
	    $(function() {
	            Swal.fire(
	             'Gagal!',
	             '<?php echo $this->session->flashdata('MsgregistGagal') ?>',
	             'error'
	           )
	    });
	  </script>
  <?php endif; ?>

</body>
</html>
