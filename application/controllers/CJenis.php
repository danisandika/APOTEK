<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CJenis extends CI_Controller {

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
     $this->load->library('form_validation');

   }

	public function index()
	{
		$data['jenis']=$this->JenisObat->getAll();
		$data['title']= "Jenis Obat";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/JenisObat/vJenisObat',$data);
    $this->load->view('Administrator/footer');
	}

	public function tambah()
  {

    $jenis = $this->JenisObat;
		$this->form_validation->set_rules('namaJenis','Nama Jenis Obat','is_unique[jenisobat.namaJenis]');

    if ($this->form_validation->run() == TRUE){
    $result = $jenis->save();
    if($result>0)$this->sukses();
    else $this->gagal();
	}else{
    $this->session->set_flashdata("Msginvoice", " Nama Jenis Obat tidak boleh sama");
    redirect(site_url('CJenis/tJenisObat'));
  }

  }

  public function tJenisObat()
  {
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/JenisObat/tJenisObat');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CJenis/index');

    $jenis = $this->JenisObat;
    $data["jenis"]=$jenis->getByID($id);
    $data['title']= "Jenis Obat";
    $this->load->view('Administrator/header',$data);
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
      if(!isset($id))redirect('CJenis/index');
      if($this->JenisObat->delete($id)){
        $this->sukses();
      }else {
      	$this->gagal();
      }
  }

	public function active($id)
	{
			if(!isset($id))redirect('CJenis/index');
			if($this->JenisObat->active($id)){
				$this->sukses();
			}else{
				$this->gagal();
			}
	}

  public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CJenis/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CJenis/index'));
  }

}
