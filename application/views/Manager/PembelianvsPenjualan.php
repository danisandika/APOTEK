<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pembelian vs Penjualan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pembelian vs Penjualan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <!-- AREA CHART -->
              <form class="" action="<?php echo site_url('CMGrafik') ?>" method="post">
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
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Pembelian vs Penjualan</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="LineChartBelinJual" style="height:500px; min-height:500px"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
</div>
