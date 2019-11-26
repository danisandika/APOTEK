<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInfo extends CI_Controller {

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
     $this->load->model("Info");
     $this->load->library("session");
		if($this->session->userdata('user_role') != 'Admin')
		{
			echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
			redirect(base_url('CLogin'));
		}
   }

	public function index()
	{
		$data['info']=$this->Info->getAll();
		$data['title']= "Info";
		$this->load->view('Administrator/header');
    $this->load->view('Administrator/Info/vInfo',$data);
    $this->load->view('Administrator/footer');
	}


		public function tambah()
	  {

	    $info = $this->Info;
	    $result = $info->save();
	    if($result>0)$this->sukses();
	    else $this->gagal();
	  }

	  public function tInfo()
	  {
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Info/tInfo');
	    $this->load->view('Administrator/footer');
	  }


	  public function edit($id=null)
	  {

	    if(!isset($id))redirect('CRole/index');

	    $role = $this->Role;
	    $data["role"]=$role->getByID($id);
	    $data['title']= "Role";
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Role/eRole',$data);
	    $this->load->view('Administrator/footer');
	  }

	  public function update()
	  {
	    $result = $this->Role->update();
	    if($result>0)$this->sukses();
	  }

	  public function delete($id)
	  {
	      if(!isset($id))redirect('CRole/index');
	      if($this->Role->delete($id)){
	        redirect(site_url('CRole/index'));
	      }
	  }

	  public function sukses()
	  {
	    redirect(site_url('CRole/index'));
	  }

	  public function gagal()
	  {
	    echo "<script>alert('Data Gagal Ditambahkan');</script>";
	  }

}
