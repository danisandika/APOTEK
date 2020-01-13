<br>
<br>
<br>
<br>
<!--::regervation_part start::-->
<section class="regervation_part section_padding">
    <div class="container">
        <div class="row align-items-center regervation_content">
            <div class="col-lg-7">
                <div class="regervation_part_iner">
                    <form action="<?php echo site_url('CFBooking/konfirmasiTransfer') ?>" method="post" enctype="multipart/form-data">
                        <h2>Pembayaran Transfer</h2>
                        <hr>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <h2>ID Pemesanan</h2>
                          </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputEmail4" name="idbooking" value="<?php echo $booking->IDBooking?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                              <h2>Nama Bank</h2>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputEmail4"
                                    value="<?php echo $booking->nama_bank?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                              <h2>Upload Transfer</h2>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="file" class="form-control" id="imgInp" name="konfirmasigambar" required>
                                <input type="hidden" class="form-control" id="imgInp" name="old_gambar" required>
                            </div>
                            <div class="form-group col-md-6">
                                <h2>Status</h2>
                            </div>
                            <div class="form-group col-md-6">
                              <?php
                              if($booking->statusBooking=='1'){echo '<input type="text" class="form-control" value="Menunggu Pembayaran" readonly>';}
                              elseif($booking->statusBooking=='2'){echo '<input type="text" class="form-control" value="Menunggu Konfirmasi Pembayaran" readonly>';}
                              elseif($booking->statusBooking=='3'){echo '<input type="text" class="form-control" value="Menunggu Diambil" readonly>';}
                              elseif($booking->statusBooking=='4'){echo '<input type="text" class="form-control" value="Pesanan Dibatalkan" readonly>';}
                              elseif($booking->statusBooking=='0'){echo '<input type="text" class="form-control" value="Pesanan Selesai" readonly>';}
                              ?>
                            </div>
                        </div>
                        <div class="regerv_btn">
                            <button type="submit" name="submit" class="btn_2">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                    <img src="#" alt="your image" id="blah" style="width:500px;height:500px;background-color:white;">
            </div>
        </div>
    </div>
</section>
<!--::regervation_part end::-->
