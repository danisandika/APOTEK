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


<<<<<<< HEAD
	public function tambah()
	{
=======
		public function tambah()
	  {
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0

	    $info = $this->Info;
	    $result = $info->save();
	    if($result>0)$this->sukses();
	    else $this->gagal();
<<<<<<< HEAD
	}
=======
	  }
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0

	  public function tInfo()
	  {
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Info/tInfo');
	    $this->load->view('Administrator/footer');
	  }


	  public function edit($id=null)
	  {

<<<<<<< HEAD
	    if(!isset($id))redirect('CInfo/index');

	    $info = $this->Info;
	    $data["info"]=$info->getByID($id);
	    $data['title']= "Info";
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Info/eInfo',$data);
=======
	    if(!isset($id))redirect('CRole/index');

	    $role = $this->Role;
	    $data["role"]=$role->getByID($id);
	    $data['title']= "Role";
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Role/eRole',$data);
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
	    $this->load->view('Administrator/footer');
	  }

	  public function update()
	  {
<<<<<<< HEAD
	    $result = $this->Info->update();
=======
	    $result = $this->Role->update();
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
	    if($result>0)$this->sukses();
	  }

	  public function delete($id)
	  {
<<<<<<< HEAD
	      if(!isset($id))redirect('CInfo/index');
	      if($this->Info->delete($id)){
	        redirect(site_url('CInfo/index'));
=======
	      if(!isset($id))redirect('CRole/index');
	      if($this->Role->delete($id)){
	        redirect(site_url('CRole/index'));
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
	      }
	  }

	  public function sukses()
	  {
<<<<<<< HEAD
	    redirect(site_url('CInfo/index'));
=======
	    redirect(site_url('CRole/index'));
>>>>>>> ca20538f60eeb485cb624996cd9d50ae5fdf6fe0
	  }

	  public function gagal()
	  {
	    echo "<script>alert('Data Gagal Ditambahkan');</script>";
	  }

}
