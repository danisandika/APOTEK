<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPembelian extends CI_Controller {

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
     $this->load->library("session");

		 if($this->session->userdata('user_role') != 'Karyawan')
		 {
			 echo "<script language='javascript'>alert('Anda Bukan Karyawan');</script>";
			 redirect(base_url('CLogin'));
		 }

   }

	public function index()
	{
		$data['data']=$this->Pembelian->getAll();
		$data['title']= "Pembelian";
		$this->load->view('Karyawan/header');
    $this->load->view('Karyawan/Pembelian/trPembelian',$data);
    $this->load->view('Karyawan/footer');
	}

	public function add_cart()
  {
    $data = array(
      'idPembelian'=>$this->input->post('id_pembelian'),
      'idObat'=>$this->input->post('id_obat'),
      'jumlah'=>$this->input->post('')
    )
  }

  public function tManagement()
  {
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Management/tManagement');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CManagement/index');

    $jenis = $this->JenisObat;
    $data["jenis"]=$jenis->getByID($id);
    $data['title']= "Management Uang";
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/JenisObat/eJenisObat',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->JenisObat->update();
    if($result>0){
			$this->sukses();
		}else {
			$this->gagal();
		}
	}

  public function delete($id)
  {
      if(!isset($id))redirect('CManagement/index');
      if($this->JenisObat->delete($id)){
        $this->sukses();
      }else {
      	$this->gagal();
      }
  }

	public function active($id)
	{
			if(!isset($id))redirect('CManagement/index');
			if($this->JenisObat->active($id)){
				$this->sukses();
			}else{
				$this->gagal();
			}
	}

  public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CManagement/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CManagement/index'));
  }

}
