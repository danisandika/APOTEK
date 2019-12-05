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
    if($this->session->userdata('user_role') != 'Admin')
    {
      echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
      redirect(base_url('CLogin'));
    }
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
    $result = $obat->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }

  public function tObat()
  {
    $data["jenis"]=$this->JenisObat->getAll();
    $data["lokasi"]=$this->Lokasi->getAll();
    $this->load->view('Administrator/header');
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
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Obat/eObat',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Obat->update();
    if($result>0)$this->sukses();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CObat/index');
      if($this->Obat->delete($id)){
        redirect(site_url('CObat/index'));
      }
  }

  public function sukses()
  {
    redirect(site_url('CObat/index'));
  }

  public function gagal()
  {
    echo "<script>alert('Data Gagal Ditambahkan');</script>";
  }

  public function get_obat_data()
	{
	    $id = $this->input->get('id');
	    $get_obat = $this->Obat->getByID($id);
	    echo json_encode($get_obat);
	    exit();
	}


}
