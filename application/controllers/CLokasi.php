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

   }


	public function index()
	{
    $data['Lokasi']=$this->Lokasi->getAll();
    $data['title']= "Lokasi";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Lokasi/vLokasi');
    $this->load->view('Administrator/footer');
	}



  public function tambah()
  {

    $supplier = $this->Supplier;
    $result = $supplier->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }

  public function tSupplier()
  {
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Lokasi/tLokasi');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CLokasi/index');

    $Lokasi = $this->Lokasi;
    $data["Lokasi"]=$Lokasi->getByID($id);
    $data['title']= "Lokasi";
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Lokasi/eLokasi',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Lokasi->update();
    if($result>0)$this->sukses();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CLokasi/index');
      if($this->Lokasi->delete($id)){
        redirect(site_url('Dashboard/index'));
      }
  }

  public function sukses()
  {
    redirect(site_url('Administrator/Lokasi/index'));
  }

  public function gagal()
  {
    echo "<script>alert('Data Gagal Ditambahkan');</script>";
  }


}
