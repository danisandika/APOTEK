<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profil</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="<?php echo base_url('upload/profil/'.$user->foto )?>"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('user_username'); ?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('user_role'); ?></p>




            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-user"></i> Nama</strong>

              <p class="text-muted">
                <?php echo $user->Nama;?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

              <p class="text-muted"><?php echo $user->Alamat;?></p>

              <hr>

              <strong><i class="fas fa-gender-alt"></i> Jenis Kelamin</strong>

              <p class="text-muted">
                <?php echo $user->jeniskelamin;?>
              </p>
              <hr>

              <strong><i class="far fa-email"></i> No.Telepon</strong>

              <p class="text-muted"><?php echo $user->NoTelp;?></p>
              <hr>

              <strong><i class="far fa-email"></i> Email</strong>

              <p class="text-muted"><?php echo $user->Email;?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">

                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Pengaturan</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">


                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" action="<?php echo site_url('CUser/updateProfil') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-10">
                        <input type="hidden" name="IDUser" value="<?php echo $user->IDUser;?>">
                        <input type="text" class="form-control" id="inputName" placeholder="Nama" name="Nama" value="<?php echo $user->Nama;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" name="Alamat" placeholder="Alamat"><?php echo $user->Alamat;?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">No.Telepon</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail" name="NoTelp" placeholder="no.Telp" value="<?php echo $user->NoTelp;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName2" class="col-sm-2 control-label">Tanggal Lahir</label>

                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputName2" name="TglLahir" placeholder="Tgl.Lahir" value="<?php echo $user->TglLahir;?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputSkills" name="Email" placeholder="Email" value="<?php echo $user->Email;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Jenis Kelamin</label>

                      <div class="col-sm-10">
                    <input type="radio" name="jk" value="Laki-Laki" <?php if($user->jeniskelamin == "Laki-Laki"){echo "checked";};?>> Laki-Laki &nbsp;&nbsp;
                    <input type="radio" name="jk" value="Perempuan" <?php if($user->jeniskelamin == "Perempuan"){echo "checked";};?>> Perempuan
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Foto Profil</label>

                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto" id="inputSkills" placeholder="Email">
                        <input type="hidden" class="form-control" name="old_foto" id="inputSkills" placeholder="Email" value="<?php echo $user->foto;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" name="username" placeholder="Username" value="<?php echo $user->username;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Password lama</label><label class="registrationFormAlert" id="divPasswordValidationResult" style="color:red;"></label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password lama" value="" onChange="checkPassword();">
                        <input type="hidden" class="form-control" id="old_pass" name="old_pass" placeholder="Password lama" value="<?php echo $user->password;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-5 control-label">Password Baru</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="newpassword" placeholder="Password Baru" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-5 control-label">Konfirmasi Password</label><label class="registrationFormAlert" id="divvalresult" style="color:red;"></label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-password" disabled onChange="checkPassword2();">
                      </div>
                    </div>
                    <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="gantipassword" value="ck"> Saya menyetujui untuk ganti password
                              </label>
                            </div>
                          </div>
                        </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btnsubmit" >Simpan</button>
                        <button type="button" class="btn btn-danger" onClick = "history.go(-1)">Kembali</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

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
