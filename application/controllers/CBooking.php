<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CBooking extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



  public function __construct()
  {
    parent::__construct();
    $this->load->model("User");
    $this->load->model("Booking");
    $this->load->model("Count");
    $this->load->library("session");
  }

  public function index()
  {
    $data['booking']=$this->Booking->getAllBookingbyKaryawan();
    $data['countbooking']=$this->Count->getcount('booking');
    $data['title']= "Booking";
    $this->load->view('Karyawan/header',$data);
    $this->load->view('Karyawan/Transaksi/vBooking',$data);
    $this->load->view('Karyawan/footer');
  }

  public function detailBooking($id=null)
  {

    if(!isset($id))redirect('CBooking/index');
    $strbk = 'TR'.substr($id,2);
    $booking = $this->Booking;
    $data["getbooking"]=$booking->getInvoiceBooking($id);
    $data['transaksi']=$booking->detailsTransaksi($strbk);
    $data["getdetailstrans"]=$booking->getdetailTransaksi($strbk);
    $data["booking"]=$booking->getAll($id);
    $data['countbooking']=$this->Count->getcount('booking');
    $data['title']= "Pemesanan";
    $this->load->view('Karyawan/header',$data);
    $this->load->view('Karyawan/Transaksi/detailBooking',$data);
    $this->load->view('Karyawan/footer');
  }

  public function submit_transaksi()
  {

    if (isset($_POST['submit'])) {
      $result = $this->Booking->submit_transaksi(2);
      if($result>0){
        $this->sukses();
      }else{
        $this->gagal();
      }
    }elseif (isset($_POST['confirmation'])) {
      $result = $this->Booking->submit_transaksi(0);
      if($result>0){
        $this->sukses();
      }else{
        $this->gagal();
      }
    }

  }

  public function sukses()
  {
    $this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CBooking/index'));
  }

  public function gagal()
  {
    $this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CBooking/index'));
  }

}

?>
