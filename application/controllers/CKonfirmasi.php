<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CKonfirmasi extends CI_Controller {

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
     $this->load->model("Pembelian");
		 $this->load->model("Konfirmasi");
     $this->load->library("session");

		 if($this->session->userdata('user_role') != 'Karyawan')
		 {
			 echo "<script language='javascript'>alert('Anda Bukan Karyawan');</script>";
			 redirect(base_url('CLogin'));
		 }

   }

	public function index()
	{
		$data['pembelian']=$this->Konfirmasi->getAll();
		$data['title']= "Pembelian";
		$this->load->view('Karyawan/header');
    $this->load->view('Karyawan/Pembelian/vPembelian',$data);
    $this->load->view('Karyawan/footer');
	}

	public function ubah_pembelian()
  {
		
    $result = $this->Konfirmasi->ubah_pembelian();
    if($result>0){
			$this->sukses();
		}else {
			$this->gagal();
		}
	}



  public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CKonfirmasi/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CKonfirmasi/index'));
  }

}
