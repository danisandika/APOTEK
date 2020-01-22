<?php

  if(isset($graph_pembelian)){
  foreach ($graph_pembelian as $item) {
    // code...
    $bulan[] = $item->bulan;
    $total[] = $item->total;
    $jumlah[]= $item->jumlah;
  }
  }
  else if(isset($graph_penjualan)){
  foreach ($graph_penjualan as $items) {
    // code...
    $bulan[] = $items->bulan;
    $total[] = $items->total;
    $jumlah[]= $items->jumlah;
  }
  }


  if (isset($graph_penjualan)&&isset($graph_pembelian)) {
    // code...
    foreach ($graph_pembelian as $item) {
      // code...
      $bulanpembelian[] = $item->bulan;
      $totalpembelian[] = $item->total;
      $jumlahpembelian[]= $item->jumlah;
    }

    foreach ($graph_penjualan as $items) {
      // code...
      $bulanpenjualan[] = $items->bulan;
      $totalpenjualan[] = $items->total;
      $jumlahpenjualan[]= $items->jumlah;
    }
  }


  if (isset($topobat)) {
    // code...
    foreach ($topobat as $obat) {
      // code...
      $jmlobat[] = $obat->jmlobat;
      $nama[] = $obat->namaObat;
      $tanggal = $obat->tgl;
    }


  }

 ?>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2019-2020 <a href="http://adminlte.io">Mustika_Farma.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js')?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php// echo base_url('assets/dist/js/pages/dashboard.js')?>"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<!--Plugins SweetAlert2-->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>



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
function deleteConfirm(url){
$('#btn-delete').attr('href', url);
$('#deleteModal').modal();
}
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





<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        type: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        type: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
  </script>

  <!-- page script -->
  <script>
  //Grafik Pembelian
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChartPembelian').get(0).getContext('2d')
      var areaChartData = {
        labels  : <?php echo json_encode($bulan); ?>,
        datasets: [
          {
            label               : 'Data Pembelian Apotek Mustika Farma',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : <?php echo json_encode($total) ?>
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }
      // This will get the first returned node in the jQuery collection.
      var areaChart       = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })






    })
  </script>

  <!-- page script -->
  <script>
    $(function () {
      //Grafik Penjualan
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChartPenjualan').get(0).getContext('2d')
      var areaChartData = {
        labels  : <?php echo json_encode($bulan); ?>,
        datasets: [
          {
            label               : 'Data Penjualan Apotek Mustika Farma',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : <?php echo json_encode($total) ?>
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }
      // This will get the first returned node in the jQuery collection.
      var areaChart       = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })


    })
  </script>


  <script>
  //Grafik Pembelian vs Penjualan
    $(function () {


          var areaChartData = {
            labels  : <?php echo json_encode($bulanpembelian) ?>,
            datasets: [
              {
                label               : 'Data Pembelian',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : <?php echo json_encode($totalpembelian) ?>
              },
              {
                label               : 'Data Penjualan',
                backgroundColor     : 'rgba(255, 99, 222, 1)',
                borderColor         : 'rgba(255, 99, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(255, 99, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : <?php echo json_encode($totalpenjualan) ?>
              },
            ]
          }

          var areaChartOptions = {
            maintainAspectRatio : true,
            responsive : true,
            legend: {
              display: true
            },
            scales: {
              xAxes: [{
                gridLines : {
                  display : false,
                }
              }],
              yAxes: [{
                gridLines : {
                  display : false,
                }
              }]
            }
          }

          //-------------
          //- LINE CHART -
          //--------------
          var lineChartCanvas = $('#LineChartBelinJual').get(0).getContext('2d')
          var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
          var lineChartData = jQuery.extend(true, {}, areaChartData)
          lineChartData.datasets[0].fill = false;
          lineChartData.datasets[1].fill = false;
          lineChartOptions.datasetFill = false

          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
          })

          })
  </script>

<script type="text/javascript">
$(function () {

  var areaChartData = {
    labels  : <?php echo json_encode($nama) ?>,
    datasets: [
      {
        label               : 'Jumlah Obat',
        backgroundColor     : ['rgba(60,141,188,0.9)','rgba(210, 214, 222, 1)','rgba(255, 99, 222, 1)'],
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo json_encode($jmlobat); ?>
      },


    ]
  }

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $('#bartop3obat').get(0).getContext('2d')
  var barChartData = jQuery.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  barChartData.datasets[0] = temp0

  var barChartOptions = {
    responsive              : true,
    legend: {
      display: false
    },
    maintainAspectRatio     : false,
    datasetFill             : false
  }

  var barChart = new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  })

})

</script>

<script type="text/javascript">
$(function () {

  var areaChartData = {
    labels  : <?php echo json_encode($nama) ?>,
    datasets: [
      {
        label               : 'Jumlah Obat',
        backgroundColor     : ['rgba(60,141,188,0.9)','rgba(210, 214, 222, 1)','rgba(255, 99, 222, 1)'],
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo json_encode($jmlobat); ?>
      },


    ]
  }

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $('#bartop3obat').get(0).getContext('2d')
  var barChartData = jQuery.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  barChartData.datasets[0] = temp0

  var barChartOptions = {
    responsive              : true,
    legend: {
      display: false
    },
    maintainAspectRatio     : false,
    datasetFill             : false
  }

  var barChart = new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  })

})

</script>

<script>
$(document).ready(function(){
  $('#bulan').on('change', function() {
  $('#bulan1').val($('#bulan').val());
  });

  $('#tahun').on('change', function() {
  $('#tahun1').val($('#tahun').val());
  });
});
</script>

<!--SCRIPT UNTUK Detail Pembelian-->
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_pembelian').click(function(){

          var id = $(this).attr('relid'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>CMPembelian/get_pembelian_data",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                var len = response.length;
                for(var i=0;i<len;i++){
                  var nama = response[i].namaObat;
                  var jumlah = response[i].jumlah;
                  var total = response[i].subTotal;

                  var tr_str = "<tr>"+
                      "<td>"+ (i+1) +"</td>" +
                      "<td>"+ nama +"</td>" +
                      "<td>"+ jumlah +"</td>" +
                      "<td> Rp."+ total +"</td>" +
                      "</tr>";
                  $("#tablePembelian tbody").append(tr_str);
                }
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });

      });

      $('#modalclose').click(function() {
        /* Act on the event */
        window.location.reload();
      });
    });
</script>

<!--SCRIPT UNTUK Detail Pembelian-->
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_penjualan').click(function(){

          var id = $(this).attr('relid'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>CMTransaksi/get_penjualan_data",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                var len = response.length;
                for(var i=0;i<len;i++){
                  var nama = response[i].namaObat;
                  var jumlah = response[i].jumlah;
                  var total = response[i].subTotal;

                  var tr_str = "<tr>"+
                      "<td>"+ (i+1) +"</td>" +
                      "<td>"+ nama +"</td>" +
                      "<td>"+ jumlah +"</td>" +
                      "<td> Rp."+ total +"</td>" +
                      "</tr>";
                  $("#tablePenjualan tbody").append(tr_str);
                }
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });

      });

      $('#modalclose').click(function() {
        /* Act on the event */
        window.location.reload();
      });
    });
</script>
</body>
</html>
