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

		 if($this->session->userdata('user_role') != 'Admin')
		 {
			 echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
			 redirect(base_url('CLogin'));
		 }

   }

	public function index()
	{
		$data['jenis']=$this->JenisObat->getAll();
		$data['title']= "Jenis Obat";
		$this->load->view('Administrator/header');
    $this->load->view('Administrator/JenisObat/vJenisObat',$data);
    $this->load->view('Administrator/footer');
	}

	public function tambah()
  {

    $jenis = $this->JenisObat;
    $result = $jenis->save();
    if($result>0)$this->sukses();
    else $this->gagal();
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
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/JenisObat/eJenisObat',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->JenisObat->update();
    if($result>0)$this->sukses();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CJenis/index');
      if($this->JenisObat->delete($id)){
        redirect(site_url('CJenis/index'));
      }
  }

  public function sukses()
  {
    redirect(site_url('CJenis/index'));
  }

  public function gagal()
  {
    echo "<script>alert('Data Gagal Ditambahkan');</script>";
  }

}
