<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2019-2020 <a href="http://adminlte.io">Mustika_Farma.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.0-rc.1
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
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.world.js')?>"></script>
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
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<script>
  $(function () {
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
<!--SCRIPT UNTUK DETAILS LOKASI-->
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){

          var id = $(this).attr('relid'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>CLokasi/get_lokasi_data",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                $('#lokasi_nama').html(response.Nama_Lokasi); //hold the response in id and show on popup
                $('#lokasi_tempat').html(response.tempatLokasi);
                $('#lokasi_deskripsi').html(response.Deskripsi);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>

<!--SCRIPT UNTUK DETAIL OBAT-->
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_obat').click(function(){

          var id = $(this).attr('relid'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>CObat/get_obat_data",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                $('#nama_obat').html(response.namaObat); //hold the response in id and show on popup
                $('#jumlah_obat').html(response.JumlahObat);
                $('#keterangan_obat').html(response.Keterangan);
                $('#satuan_obat').html(response.Satuan);
                $('#harga_obat').html(response.Harga);
                $('#kadaluarsa_obat').html(response.Expired);
                var xfoto = response.Foto;
                //BELUM FIX SOAL FOTO
                $('#foto_obat').html('<img src="<?php echo base_url('upload/obat/')?>'+response.Foto+'" width="150" id="foto_obat" class="rounded"/>');
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>
</body>
</html>
