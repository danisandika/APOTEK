<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-5">
                  <div class="wizard-v3-content">
                    <div class="wizard-form ">
                      <div class="wizard-header">
                        <h3 class="heading">Lanjutkan Pembayaran</h3>
                        <p>Isi Formulir terlebih dahulu untuk ke proses berikutnya</p>
                      </div>
                          <form class="form-register" action="<?php echo site_url('CFBooking/tambah')?>" method="post">
                            <div id="form-total">
                              <!-- SECTION 1 -->
                                <h2>
                                  <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                                  <span class="step-text">Data Pribadi</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                      <h3>Data Pribadi</h3>
                                      <div class="form-row table-responsive">
                                  <input type="hidden" value="<?php echo $user->IDUser ?>" name="iduser">
                                  <table class="table">
                                    <tbody>
                                      <tr class="space-row">
                                        <th>Nama : </th>
                                        <td><input type="text" name="nama" class="single-input" id="username" value="<?php echo $user->Nama ?>" readonly></td>
                                      </tr>
                                      <tr class="space-row">
                                        <th>Email : </th>
                                        <td><input type="text" name="email" class="single-input" id="email" value="<?php echo $user->Email ?>" readonly></td>
                                      </tr>
                                      <tr class="space-row">
                                        <th>No.Telepon : </th>
                                        <td><input type="text" name="notelp" class="single-input" id="phone" value="<?php echo $user->NoTelp ?>" readonly></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                                </section>
                          <!-- SECTION 2 -->
                                <h2>
                                  <span class="step-icon"><i class="zmdi zmdi-money-box"></i></span>
                                  <span class="step-text">Data Produk</span>
                                </h2>
                                <section>
                                  <div class="inner">
                                    <h3>Data Obat</h3>
                                    <div class="form-row table-responsive">
                                      <table class="table">
                                          <thead>
                                          <tr>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                          </tr>
                                          </thead>
                                          <tbody id="detail_cart_trans">
                                          </tbody>
                                      </table>
                              </div>

                            </div>
                                </section>
                                <!-- SECTION 3 -->
                                <h2>
                                  <span class="step-icon"><i class="zmdi zmdi-card"></i></span>
                                  <span class="step-text">Pembayaran</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                      <h3>Informasi Pembayaran:</h3>
                                      <div class="form-row" id="radio">
                                        <div class="form-holder form-holder-2">
                                          <input type="radio" name="radio1" id="pay-1" value="Transfer" onclick="javascript:transfer();">
                                          <label class="pay-1-label" for="pay-1"><img src="<?php echo base_url('wizard/images/logo-bank.png')?>" style="width:150px;height:100px;" alt="pay-1" required>Transfer Bank</label>
                                          <input type="radio" name="radio1" id="pay-2" value="Tunai" onclick="javascript:transfer();">
                                          <label class="pay-2-label" for="pay-2"><img src="<?php echo base_url('wizard/images/uang-Rupiah.jpg')?>" style="width:150px;height:100px;" alt="pay-2" required>Bayar Tunai</label>
                                        </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="form-row" style="visibility:hidden;" id="transfer">
                                      <select name="nama_bank" class="single-input">
                                        <option value="" disabled selected>--Pilih Bank--</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BRI">BRI</option>
                                      </select>
                                      </div>
                                      <hr>
                                      <div class="form-row">
                                        <textarea name="deskripsi" rows="8" cols="80" class="single-textarea" placeholder="Deskripsi" id="address"></textarea>
                                      </div>

                            </div>
                                </section>
                                <!-- SECTION 4 -->
                                <h2>
                                  <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                                  <span class="step-text">Konfirmasi</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                      <h3>Detail Konfirmasi</h3>
                                      <div class="form-row table-responsive">
                                <table class="table">
                                  <tbody>
                                    <tr class="space-row">
                                      <th>Nama:</th>
                                      <td id="username-val"></td>
                                    </tr>
                                    <tr class="space-row">
                                      <th>Email</th>
                                      <td id="email-val"></td>
                                    </tr>
                                    <tr class="space-row">
                                      <th>No.Telp</th>
                                      <td id="phone-val"></td>
                                    </tr>
                                    <tr class="space-row">
                                      <th>Metode Pembayaran</th>
                                      <td id="gender-val"></td>
                                    </tr>
                                    <tr class="space-row">
                                      <th>Deskripsi</th>
                                      <td id="address-val"></td>
                                    </tr>
                                    <?php
                                      $totalBayar=0;
                                      foreach ($this->Booking->showCart($this->session->userdata('user_userID')) as $items) {
                                        $totalBayar = $totalBayar + $items->subTotal;

                                    }
                                      echo '
                                      <tr class="space-row">
                                        <th>Total:</th>
                                        <td>'.'Rp'.number_format($totalBayar).'</td>
                                      </tr>';
                                    ?>

                                  </tbody>
                                </table>
                                <input type="submit" name="submit" value="Simpan" class="genric-btn primary circle arrow">
                              </div>
                            </div>
                          </section>
                          </div>
                          </form>
                    </div>
                  </div>
                </div>
            </div>
    </div>
</section>
<script>
function myNotif() {
 Swal.fire(
  'Sukses!',
  'Data Dimasukan dikeranjang!',
  'success'
)
}
</script>

<script type="text/javascript">

function transfer() {
    if (document.getElementById('pay-1').checked) {
        document.getElementById('transfer').style.visibility = 'visible';
    }
    else document.getElementById('transfer').style.visibility = 'hidden';

}
</script>
