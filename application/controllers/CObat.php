<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CObat extends CI_Controller {

   public function __construct()
   {
     parent::__construct();
     $this->load->model("Obat");
     $this->load->model("JenisObat");
     $this->load->model("Lokasi");
     $this->load->library("session");
     $this->load->library('form_validation');
   }


	public function index()
	{
    $data['obat']=$this->Obat->getAll();
    $data['title']= "Obat";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Obat/vObat');
    $this->load->view('Administrator/footer');
	}



  public function tambah()
  {
    $obat = $this->Obat;
    $this->form_validation->set_rules('namaObat','Nama Obat','is_unique[obat.namaObat]');

    if ($this->form_validation->run() == TRUE){
    $result = $obat->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }else{
    $this->session->set_flashdata("Msginvoice", " Nama Obat tidak boleh sama");
    redirect(site_url('CObat/tObat'));
  }
  }

  public function tObat()
  {
    $data["jenis"]=$this->JenisObat->getAll();
    $data["lokasi"]=$this->Lokasi->getAll();
    $data['title']= "Obat";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Obat/tObat',$data);
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CObat/index');

    $obat = $this->Obat;
    $data["jenis"]=$this->JenisObat->getAll();
    $data["lokasi"]=$this->Lokasi->getAll();
    $data["obat"]=$obat->getByID($id);
    $data['title']= "Obat";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Obat/eObat',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Obat->update();
    if($result>0){
      $this->sukses();
    }else{
      $this->gagal();
    }
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CObat/index');
      if($this->Obat->delete($id)){
        $this->sukses();
      }else{
        $this->gagal();
      }
  }

  public function active($id)
  {
      if(!isset($id))redirect('CObat/index');
      if($this->Obat->active($id)){
        $this->sukses();
      }else{
        $this->gagal();
      }
  }

  public function sukses()
  {
    $this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CObat/index'));
  }

  public function gagal()
  {
    $this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CObat/index'));
  }


  public function get_obat_data()
	{
	    $id = $this->input->get('id');
	    $get_obat = $this->Obat->getByID($id);
	    echo json_encode($get_obat);
	    exit();
	}


}
