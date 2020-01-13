<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CStok extends CI_Controller {

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
     $this->load->model("Obat");
		 $this->load->model("Count");
   }


	public function index()
	{
		$data['obat']=$this->Obat->getAll();
		$data['countbooking']=$this->Count->getcount('booking');
		$data['countjumlahobat']=$this->Count->getcountJumlahObat();
		$data['countexpired']=$this->Count->getcountExpired();
		$data['title']= "Cek Obat";
		$this->load->view('Karyawan/header',$data);
    $this->load->view('Karyawan/vCekStok',$data);
    $this->load->view('Karyawan/footer');
	}

	public function deleteStok($id)
	{
		if(!isset($id))redirect('CStok/index');
		if($this->Obat->deleteStok($id))$this->sukses();
		else $this->gagal();
	}

	public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CStok/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CStok/index'));
  }



}
