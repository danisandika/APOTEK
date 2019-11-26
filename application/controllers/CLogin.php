<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

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
    $this->load->model("UserLogin");
    $this->load->model("Role");
  }



  public function cekLogin()
  {
    $post = $this->input->post();
    if(isset($post["username"])&&isset($post["pass"]))
    {
      //cek user
      $userLogin = $this->UserLogin;
      $user = $this->Login;
      $userRole = $this->Role;
      $data = $user->getByUsernamePassword();
      $datauserLogin = $userLogin->getRoleID($data->IDLogin);

      if($datauserLogin != null)
      {
        //Adding data to Session
        $dataRole = $userRole->getByID($datauserLogin->IDrole);

        $username=$data->username;
        $role = $dataRole->Deskripsi;
        $userID=$data->$IDUser;

        $newdata = array(
          'user_username'=>$Username,
          'user_role'=>$role,
          'user_userID'=>$userID
        );
        $this->session->set_userdata($newdata);

        if($role == "Admin")
        {
          redirect(site_url('CDashboard'));
        }
        elseif ($role == "Karyawan") {
          echo "<script>alert('Hallo Karyawan');</script>";

        }
        else {
            echo "<script>alert('Data Tidak Ditemukan dalam Database');</script>";
        }
      }else {
        $this->load->view('login');
      }
    }
  }

  public function index()
	{
    $this->load->view('login');
	}

  public function logout()
    {
        $this->session->sess_destroy();
        redirect('CLogin');
    }
}
