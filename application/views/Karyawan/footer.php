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

<script type="text/javascript">
function BuangConfirm(url){
$('#btn-delete').attr('href', url);
$('#bModal').modal();
}
</script>

<script type="text/javascript">
function activeConfirm(url){
$('#btn-active').attr('href', url);
$('#aModal').modal();
}
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id_obat       = $(this).data("id_obat");
            var namaobat      = $(this).data("namaobat");
            var jumlah        = $('#' + id_obat).val();
            var harga         = $('#H' + id_obat).val();

            $.ajax({
                url : "<?php echo site_url('CPembelian/add_cart');?>",
                method : "POST",
                data : {id_obat: id_obat, namaobat: namaobat, harga: harga, jumlah: jumlah},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
        $('#detail_cart').load("<?php echo site_url('CPembelian/load_cart');?>");


        $(document).on('click','.remove_cart',function(){
            var row_id=$(this).attr("id");
            $.ajax({
                url : "<?php echo site_url('CPembelian/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('.add_cartPenjualan').click(function(){
            var id_obat       = $(this).data("id_obat");
            var namaobat      = $(this).data("namaobat");
            var jumlah        = $('#' + id_obat).val();
            var harga         = $(this).data("harga");

            $.ajax({
                url : "<?php echo site_url('CTransaksi/add_cart');?>",
                method : "POST",
                data : {id_obat: id_obat, namaobat: namaobat, harga: harga, jumlah: jumlah},
                success: function(data){
                    $('#detail_cartPenjualan').html(data);
                }
            });
        });

		$('#detail_cartPenjualan').load("<?php echo site_url('CTransaksi/load_cart');?>");

		$(document).on('click','.remove_cart',function(){
            var row_id=$(this).attr("id");
            $.ajax({
                url : "<?php echo site_url('CTransaksi/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cartPenjualan').html(data);
                }
            });
        });
	});



</script>


<script type="text/javascript">
$(document).ready(function(){
	$('.add_cartBayar').click(function(){
            var id_obat       = $(this).data("id_obat");
            var namaobat      = $(this).data("namaobat");
            var jumlah        = $('#' + id_obat).val();
            var harga         = $(this).data("harga");

            $.ajax({
                url : "<?php echo site_url('CKonf_Transaksi/add_cart');?>",
                method : "POST",
                data : {id_obat: id_obat,harga: harga},
                success: function(data){
                    $('#detail_cartBayar').html(data);
                }
            });
        });

		$('#detail_cartBayar').load("<?php echo site_url('CKonf_Transaksi/load_cart');?>");

		$(document).on('click','.remove_cart',function(){
            var row_id=$(this).attr("id");
            $.ajax({
                url : "<?php echo site_url('CKonf_Transaksi/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cartBayar').html(data);
                }
            });
        });
	});
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

<script>
	    $(document).ready(function() {
	        // Untuk sunting
	        $('#edit-data-pembelian').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal          = $(this)

	            // Isi nilai pada field
	            modal.find('#id').attr("value",div.data('id'));
              modal.find('#idp').attr("value",div.data('idp'));
	            modal.find('#nama').attr("value",div.data('nama'));
	            modal.find('#jumlah').attr("value",div.data('jumlah'));
              modal.find('#satuan').attr("value",div.data('satuan'));
	        });
	    });
</script>




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




</body>
</html>
