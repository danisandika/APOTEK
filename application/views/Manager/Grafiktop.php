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
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Grafik Top 3 Obat</a></li>

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <h3>Grafik Top 3 Obat</h3>
                  <hr>
                  <form class="" action="<?php echo site_url('CMGrafiktop') ?>" method="post">
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
                      <h3 class="card-title">Grafik Top 3 Obat</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="bartop3obat" style="height:500px; min-height:500px"></canvas>
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
