<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSupplier extends CI_Controller {

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
     $this->load->model("Supplier");
     $this->load->library("session");
     $this->load->library('form_validation');

   }


	public function index()
	{
    $data['supplier']=$this->Supplier->getAll();
    $data['title']= "Supplier";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Supplier/vSupplier');
    $this->load->view('Administrator/footer');
	}



  public function tambah()
  {
    $this->form_validation->set_rules('namaSupplier','Nama Supplier','is_unique[supplier.NamaSupplier]');

    if ($this->form_validation->run() == TRUE){
    $supplier = $this->Supplier;
    $result = $supplier->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }else{
    $this->session->set_flashdata("Msginvoice", " Nama Supplier sudah terdaftar");
    redirect(site_url('CSupplier/tSupplier'));
  }
}
  public function tSupplier()
  {
    $data['title']= "Supplier";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Supplier/tSupplier');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CSupplier/index');

    $supplier = $this->Supplier;
    $data["supplier"]=$supplier->getByID($id);
    $data['title']= "Supplier";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Supplier/eSupplier',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Supplier->update();
    if($result>0)$this->sukses();
    else{
      $this->gagal();
    }
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CSupplier/index');
      if($this->Supplier->delete($id))$this->sukses();
      else{
        $this->gagal();
      }
  }

  public function active($id)
  {
      if(!isset($id))redirect('CSupplier/index');
      if($this->Supplier->active($id)){
        $this->sukses();
      }else{
        $this->gagal();
      }
  }

  public function sukses()
  {
    $this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CSupplier/index'));
  }

  public function gagal()
  {
    $this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CSupplier/index'));
  }


}
