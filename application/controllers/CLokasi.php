<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLokasi extends CI_Controller {

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
     $this->load->model("Lokasi");
     $this->load->library("session");

    if($this->session->userdata('user_role') != 'Admin')
    {
      echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
      redirect(base_url('CLogin'));
    }

   }

	public function index()
	{
		$data['lokasi']=$this->Lokasi->getAll();
		$data['title']= "Lokasi Penyimpanan";
		$this->load->view('Administrator/header');
    $this->load->view('Administrator/Lokasi/vLokasi',$data);
    $this->load->view('Administrator/footer');
	}

	public function tambah()
  {

    $lokasi = $this->Lokasi;
    $result = $lokasi->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }

  public function tLokasi()
  {
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Lokasi/tLokasi');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CLokasi/index');

    $lokasi = $this->Lokasi;
    $data["lokasi"]=$lokasi->getByID($id);
    $data['title']= "Lokasi Penyimpanan";
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Lokasi/eLokasi',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Lokasi->update();
    if($result>0)$this->sukses();
		else $this->gagal();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CLokasi/index');
      if($this->Lokasi->delete($id))$this->sukses();
			else $this->gagal();
  }

	public function active($id)
	{
			if(!isset($id))redirect('CLokasi/index');
			if($this->Lokasi->active($id)){
				$this->sukses();
			}else{
				$this->gagal();
			}
	}

  public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CLokasi/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CLokasi/index'));
  }

	public function get_lokasi_data()
	{
	    $id = $this->input->get('id');
	    $get_lokasi = $this->Lokasi->getByID($id);
	    echo json_encode($get_lokasi);
	    exit();
	}

}
