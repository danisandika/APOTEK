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
     $this->load->model("JenisObat");

		 if($this->session->userdata('user_role') != 'Admin')
 		 {
 			 echo "<script language='javascript'>alert('Anda Bukan Administrator');</script>";
 			 redirect(base_url('CLogin'));
 		 }
	 }

	public function index()
	{
		$this->load->view('Administrator/header');
    $this->load->view('Administrator/EditProfil');
    $this->load->view('Administrator/footer');


	}
}