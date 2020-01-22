<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
<br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Laporan</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Grafik</a></li>

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <h3>Laporan Data Penjualan</h3>
                  <hr>
                  <form class="" action="<?php echo site_url('CMTransaksi/rPenjualan') ?>" method="post">
                    <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-12 control-label">Bulan</label>
                      <div class="col-sm-12">
                        <select name="bulan" id="bulan" class='custom-select custom-select-sm'>
                          <option value="" selected disabled>--Bulan--</option>
                          <?php
                            $bulan=array("bulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            $jlh_bln=count($bulan);
                            for($c=1; $c<$jlh_bln; $c+=1){
                                echo"<option value=$c> $bulan[$c] </option>";
                            }
                            ?>
                        </select>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-12 control-label">Tahun</label>
                      <div class="col-sm-12">
                        <select name="tahun" id="tahun" class='custom-select custom-select-sm'>
                          <option value="" disabled selected>--Tahun--</option>
                          <?php
                          $now = date('Y');
                          for ($a=2000;$a<=$now;$a++)
                            {
                               echo "<option value='$a' >$a</option>";
                            }
                           ?>
                        </select>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-12 control-label">&nbsp;</label>
                      <div class="col-sm-6">
                      <button type="submit" name="submit" class="btn btn-primary btn-sm add_filter">Filter</button>
                      </div>
                    </div>
                    </div>
                  </div>
                  </form>
                  <br>
                  <table id="table1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th align="center">No</th>
                      <th align="center">ID Pembelian</th>
                      <th align="center">Tanggal</th>
                      <th align="center">Total</th>
                      <th align="center">Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                      <?php $i=0?>
                      <?php foreach ($penjualan as $s) { ?>
                      <tr>
                          <td><?php $i++; echo $i?></td>
                          <td><?php echo $s->IDTransaksi?></td>
                          <td><?php echo $s->Tanggal?></td>
                          <td align="right">Rp.<?php echo number_format($s->totalBayar)?></td>
                          <td><a href="#" class="btn btn-primary btn-sm view_penjualan" relid="<?php echo $s->IDTransaksi;  ?>"><span class="fas fa-eye"></span> | Details</a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-12 control-label">&nbsp;</label>
                    <div class="col-sm-12">
                    <!--<input type="hidden" name="bulan" value="" id="bulan1">
                    <input type="hidden" name="tahun" value="" id="tahun1">-->
                    <a href="<?php echo site_url('CMTransaksi/create_pdf/'.base64_encode(serialize($penjualan))); ?>" class="btn btn-success float-right"><span class="fas fa-print">&nbsp;</span>| Print</a>

                    </div>
                  </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <h3>Grafik Penjualan</h3>
                  <hr>
                  <form class="" action="<?php echo site_url('CMTransaksi/rPenjualan') ?>" method="post">
                    <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-12 control-label">Tahun</label>
                      <div class="col-sm-12">
                        <select name="tahunp" class='custom-select custom-select-sm'>
                          <option value="" disabled selected>--Tahun--</option>
                          <?php
                          $now = date('Y');
                          for ($a=2000;$a<=$now;$a++)
                            {
                               echo "<option value='$a' >$a</option>";
                            }
                           ?>
                        </select>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-3">

                    <div class="form-group">
                      <label for="inputName" class="col-sm-12 control-label">&nbsp;</label>
                      <div class="col-sm-6">
                      <button type="submit" name="submit" class="btn btn-primary btn-sm add_filter">Filter</button>
                      </div>
                    </div>

                    </div>
                  </div>
                  </form>
                  <br>

                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Grafik Penjualan </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="areaChartPenjualan" style="height:500px; min-height:500px"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
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


<!--Modal Details-->
<div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-info">&nbsp;</i>Informasi</h3>
      </div>
      <div class="modal-body">
        <h3>Data Detail Penjualan</h3>
        <table class="table table-bordered table-striped" id="tablePenjualan">
          <thead>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Total</th>
          </thead>
          <tbody>

          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="modalclose"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
