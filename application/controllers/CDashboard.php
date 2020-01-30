<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {

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
     $this->load->model("JenisObat");
     $this->load->library("session");
		 $this->load->model("Count");
	 }

	public function index()
	{
			$data['getcount_booking']=$this->Count->getcount('booking');
			$data['getcount_transaksi']=$this->Count->getcount('transaksi');
			$data['getcount_user']=$this->Count->getcount('user');
			$data['getcount_obat']=$this->Count->getcount('obat');

			$data['title']= "Dashboard";
		  $this->load->view('Administrator/header',$data);
			$this->load->view('Administrator/Dashboard',$data);
			$this->load->view('Administrator/footer');
	}

	public function index2()
	{
			$data['getcount_booking']=$this->Count->getcount('booking');
			$data['getcount_transaksi']=$this->Count->getcount('transaksi');
			$data['getcount_user']=$this->Count->getcount('user');
			$data['getcount_obat']=$this->Count->getcount('obat');
			$data['title']= "Dashboard";
			$data['countbooking']=$this->Count->getcount_booking();
			$data['countjumlahobat']=$this->Count->getcountJumlahObat();
			$data['countexpired']=$this->Count->getcountExpired();
			$this->load->view('Karyawan/header',$data);
	    $this->load->view('Karyawan/Dashboard',$data);
	    $this->load->view('Karyawan/footer');
	}

	public function index3()
	{
			$data['title']= "Dashboard";
			$data['getcount_booking']=$this->Count->getcountbk('booking');
			$data['getcount_transaksi']=$this->Count->getcount('transaksi');
			$data['getcount_user']=$this->Count->getcount('user');
			$data['getcount_obat']=$this->Count->getcount('obat');
			$data['countbooking']=$this->Count->getcount_booking();
			$data['countjumlahobat']=$this->Count->getcountJumlahObat();
			$data['countexpired']=$this->Count->getcountExpired();
			$this->load->view('Manager/header',$data);
	    $this->load->view('Manager/Dashboard',$data);
	    $this->load->view('Manager/footer');
	}
}
