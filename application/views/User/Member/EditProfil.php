<section class="feature_part single_feature_page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Profil</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="contact-info__icon"><i class="ti-user"></i></span>
                            <h4>Nama</h4>
                            <p><?php echo $user->Nama ?><br><hr><?php echo $this->session->userdata('user_role'); ?></p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <h4>Email</h4>
                            <p><?php echo $user->Email ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                        <div class="single_feature_img">
                            <img src="<?php echo base_url('upload/profil/'.$user->foto)?>" alt="" class="" style="border-radius:50%;">
                        </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <h4>No.Telepon</h4>
                            <p><?php echo $user->NoTelp ?></p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="contact-info__icon"><i class="ti-location-pin"></i></span>
                            <h4>Alamat</h4>
                            <p><?php echo $user->Alamat ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Start Align Area -->
<div class="whole-wrap">
  <div class="container box_1170">
<div class="section-top-border">
  <br>
  <div class="row justify-content-center">
      <div class="col-xl-8">
          <div class="section_tittle text-center">
              <h2>Edit Profil</h2>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <form  action="<?php echo site_url('CUser/updateProfil') ?>" method="post" enctype="multipart/form-data">
        <div class="mt-10">
          <input type="hidden" name="IDUser" value="<?php echo $user->IDUser;?>">
          <input type="text" name="Nama" placeholder="Nama"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" required
            class="single-input" value="<?php echo $user->Nama;?>">
        </div>
        <div class="mt-10">
          <input type="text" name="NoTelp" placeholder="Nomor Telepon"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Telepon'" required
            class="single-input" value="<?php echo $user->NoTelp;?>">
        </div>
        <div class="mt-10">
          <input type="date" name="TglLahir" placeholder="Tanggal Lahir"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tanggal Lahir'" required
            class="single-input" value="<?php echo $user->TglLahir;?>">
        </div>
        <div class="mt-10">
          <input type="email" name="Email" placeholder="Email"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email'" required
            class="single-input" value="<?php echo $user->Email;?>">
        </div>


        <div class="mt-10">
          <textarea class="single-textarea" placeholder="Alamat" onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Alamat'" name="Alamat" required><?php echo $user->Alamat;?></textarea>
        </div>
        <div class="mt-10">

					<label for="default-radio">Jenis Kelamin</label>
          <br>
          <input type="radio" name="jk" class="default-radio" value="Laki-Laki" <?php if($user->jeniskelamin == "Laki-Laki"){echo "checked";};?>> Laki-Laki &nbsp;&nbsp;
          <input type="radio" name="jk" class="default-radio" value="Perempuan" <?php if($user->jeniskelamin == "Perempuan"){echo "checked";};?>> Perempuan

				</div>
        <!-- For Gradient Border Use -->
        <!-- <div class="mt-10">
              <div class="primary-input">
                <input id="primary-input" type="text" name="first_name" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                <label for="primary-input"></label>
              </div>
            </div> -->
            <div class="mt-10">
              <label for="default-radio">Foto Profil</label>
              <input type="file" name="foto" placeholder="Foto"
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Foto Profil'" required
                class="single-input">
                <input type="hidden" class="form-control" name="old_foto" id="inputSkills" placeholder="Email" value="<?php echo $user->foto;?>">
            </div>

    </div>

    <div class="col-lg-6 col-md-6">
        <div class="mt-10">
          <input type="text" name="username" placeholder="Username"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required
            class="single-input" value="<?php echo $user->username;?>">
        </div>
        <div class="mt-10">
          <input type="password" placeholder="Password Lama"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Lama'" required
            class="single-input" id="password" onChange="checkPassword();">
            <input type="hidden" class="form-control" id="old_pass" name="old_pass" placeholder="Password lama" value="<?php echo $user->password;?>">
        </div>
        <div class="mt-10">
          <input type="password"  placeholder="Password Baru"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru'" required
            class="single-input" disabled id="newpassword">
        </div>
        <div class="mt-10">
          <input type="password" id="repassword" name="repassword" placeholder="Re-Password"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-Password'" required
            class="single-input" disabled onChange="checkPassword2();">
            <label class="registrationFormAlert" id="divvalresult" style="color:red;"></label>
        </div>
        <div class="mt-10">
          <input type="checkbox" name="gantipassword" value="ck"> Saya menyetujui untuk ganti password
        </div>

    </div>

  </div>
  <hr>
  <button type="submit" name="submit" class="genric-btn success circle arrow">Simpan<span class="lnr lnr-arrow-right"></span></button>
  <button type="button" name="submit" class="genric-btn danger circle arrow" onClick = "history.go(-1)">Kembali<span class="lnr lnr-arrow-right"></span></button>
</form>
</div>
</div>
</div>
