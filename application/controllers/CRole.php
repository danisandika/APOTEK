<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRole extends CI_Controller {

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
     $this->load->model("Role");
     $this->load->library("session");
		 $this->load->library('form_validation');
   }


	public function index()
	{
		$data['role']=$this->Role->getAll();
		$data['title']= "Role";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/Role/vRole',$data);
    $this->load->view('Administrator/footer');
	}


		public function tambah()
	  {

	    $role = $this->Role;
			$this->form_validation->set_rules('Deskripsi','Nama Role','is_unique[role.Deskripsi]');

			if ($this->form_validation->run() == TRUE){
	    $result = $role->save();
	    if($result>0)$this->sukses();
	    else $this->gagal();
		}else{
	    $this->session->set_flashdata("Msginvoice", " Nama Role tidak boleh sama");
	    redirect(site_url('CRole/tRole'));
	  }
	  }

	  public function tRole()
	  {
			$data['title']= "Role";
	    $this->load->view('Administrator/header',$data);
	    $this->load->view('Administrator/Role/tRole');
	    $this->load->view('Administrator/footer');
	  }


	  public function edit($id=null)
	  {

	    if(!isset($id))redirect('CRole/index');

	    $role = $this->Role;
	    $data["role"]=$role->getByID($id);
	    $data['title']= "Role";
	    $this->load->view('Administrator/header',$data);
	    $this->load->view('Administrator/Role/eRole',$data);
	    $this->load->view('Administrator/footer');
	  }

	  public function update()
	  {
	    $result = $this->Role->update();
	    if($result>0)$this->sukses();
	    else $this->gagal();
	  }

	  public function delete($id)
	  {
	      if(!isset($id))redirect('CRole/index');
	      if($this->Role->delete($id))$this->sukses();
		    else $this->gagal();
	  }

		public function active($id)
	  {
	      if(!isset($id))redirect('CRole/index');
	      if($this->Role->active($id)){
					$this->sukses();
				}else{
					$this->gagal();
				}
	  }

	  public function sukses()
	  {
			$this->session->set_flashdata("globalmsgsuccess", "Sukses");
	    redirect(site_url('CRole/index'));
	  }

	  public function gagal()
	  {
			$this->session->set_flashdata("globalmsggagal", "Gagal");
	    redirect(site_url('CRole/index'));
	  }

}
