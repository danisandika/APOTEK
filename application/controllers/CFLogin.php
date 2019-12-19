<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CFLogin extends CI_Controller {

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
    $this->load->model("Login");
  }



  public function cekLogin()
  {
    $post = $this->input->post();
    if(isset($post["username"])&&isset($post["pass"]))
    {
      //cek user
      $login= $this->Login;

      $dataUser = $login->getByUsernamePassword();
      //$dataUser = $user->getByUsernamePassword();

      if($dataUser != null && $dataUser->status == 1)
      {
        $dataRole = $login->getRoleID($dataUser->IDRole);
        //Adding data to Session
        $username= $dataUser->username;
        $role    = $dataRole->Deskripsi;
        $userID  = $dataUser->IDUser;
        $roleID  = $dataRole->IDRole;
        $userFoto= $dataUser->foto;

        $newdata = array(
          'user_username'=>$username,
          'user_role'=>$role,
          'user_userID'=>$userID,
          'user_roleID'=>$roleID,
          'user_profil'=>$userFoto
        );
        $this->session->set_userdata($newdata);

        if($role == "User")
        {
          redirect(site_url('CFDashboard/index'));
        }
        else {
            echo "<script>alert('Data Tidak Ditemukan dalam Database');</script>";
        }
      }else {
        $this->load->view('User/Login');
      }
    }
  }

  public function index()
	{
    $this->load->view('User/Login');
	}

  public function logout()
    {
        $this->session->sess_destroy();
        redirect('CFLogin');
    }
}
