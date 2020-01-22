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
    $this->load->model("User");
    $this->load->library('form_validation');
    $this->load->model("Role");
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

  public function register()
  {
    $this->load->view('User/Register');
  }

  public function Register_Member()
  {
    $this->form_validation->set_rules('Username','Username','is_unique[user.username]');

    if ($this->form_validation->run() == TRUE){
    $user = $this->User;
    $sendEmail = $this->send();
    $result = $user->save_user();
    if($result>0 ){
      $this->session->set_flashdata("MsgregistSukses", "Pendaftaran Berhasil");
      redirect(site_url('CFLogin/index'));
    }
    else{
      $this->session->set_flashdata("MsgregistGagal", " Username sudah dipakai, cari yang lain");
      redirect(site_url('CFLogin/register'));
    }
  }else{
    $this->session->set_flashdata("MsgregistGagal", " Username sudah dipakai, cari yang lain");
    redirect(site_url('CFLogin/register'));
  }
  }



  public function send(){
    $this->load->library('mailer');

    $email_penerima = $this->input->post('email');
    $isiUsername = $this->input->post('Username');
    $isiPassword = $this->input->post('password');
    $isiRole     = $this->Role->getByID(3);


    $subjek = 'Pendaftaran User Baru Apotek Mustika Farma';
    $pesan = 'Thanks and Regards. Jakarta,'.date('Y-m-d H:i:s');
    $attachment = 'Non';//$_FILES['foto'];
    $content = $this->load->view('Administrator/User/content', array('pesan'=>$pesan,'isiRole'=>$isiRole->Deskripsi,
    'isiUsername'=>$isiUsername,'isiPassword'=>$isiPassword), true); // Ambil isi file content.php dan masukan ke variabel $content
    $sendmail = array(
      'email_penerima'=>$email_penerima,
      'subjek'=>$subjek,
      'content'=>$content,
      'attachment'=>$attachment
    );
    if(empty($attachment['name'])){ // Jika tanpa attachment
      $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
    }else{ // Jika dengan attachment
      $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
    }
    echo "<b>".$send['status']."</b><br />";
    echo $send['message'];
    echo "<br /><a href='".site_url("CFLogin")."'>Kembali ke Form</a>";
  }

  public function logout()
    {
        $this->session->sess_destroy();
        redirect('CFLogin');
    }
}
