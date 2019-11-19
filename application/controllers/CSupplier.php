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

   }


	public function index()
	{
		$this->load->view('Administrator/header');
    $this->load->view('Administrator/Supplier/vSupplier');
    $this->load->view('Administrator/footer');
	}



  public function tambah()
  {

    $supplier = $this->Supplier;
    $result = $supplier->save();
    if($result>0)$this->sukses();
    else $this->gagal();
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CSupplier/index');

    $supplier = $this->Supplier;

    $this->load->view('Administrator/header');
    $this->load->view('Administrator/Supplier/eSupplier');
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->Supplier->update();
    if($result>0)$this->sukses();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CSupplier/index');
      if($this->Supplier->delete($id)){
        redirect(site_url('Dashboard/index'));
      }
  }

  public function sukses()
  {
    redirect(site_url('Administrator/Dashboard/index'));
  }

  public function gagal()
  {
    echo "<script>alert('Data Gagal Ditambahkan');</script>";
  }


}