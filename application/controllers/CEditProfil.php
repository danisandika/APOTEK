<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEditProfil extends CI_Controller {

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
     $this->load->model("User");
		  $this->load->model("Count");
	 }

	public function editUser($id)
	{
		$user = $this->User;
		$data['title']= "Edit Profil";
		$data["user"]=$user->getByID($id);
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/EditProfil',$data);
    $this->load->view('Administrator/footer');
	}

	public function editUserKaryawan($id)
	{
		$data['title']= "Edit Profil";
		$data['countbooking']=$this->Count->getcount('booking');
		$data['countjumlahobat']=$this->Count->getcountJumlahObat();
		$data['countexpired']=$this->Count->getcountExpired();
		$user = $this->User;
		$data["user"]=$user->getByID($id);
		$this->load->view('Karyawan/header',$data);
    $this->load->view('Karyawan/EditProfil',$data);
    $this->load->view('Karyawan/footer');
	}

	public function editUserManager($id)
	{
		$user = $this->User;
		$data['title']= "Edit Profil";
		$data["user"]=$user->getByID($id);
		$this->load->view('Manager/header',$data);
    $this->load->view('Manager/EditProfil',$data);
    $this->load->view('Manager/footer');
	}
}
