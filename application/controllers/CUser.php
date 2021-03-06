<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUser extends CI_Controller {

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
  	 $this->load->model("Role");
  	 $this->load->model("Login");
     $this->load->library("session");
     $this->load->library('form_validation');

   }

	public function index()
	{
    $data['user']=$this->User->getAll();
    $data['title']= "User";
		$this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/User/vUser');
    $this->load->view('Administrator/footer');
	}


	private $_table = "User";

	public function tambah()
  {
    $this->form_validation->set_rules('Username','Username','is_unique[user.username]');

    if ($this->form_validation->run() == TRUE){
    $password = $this->generateRandomString();
    $user = $this->User;
    $sendEmail = $this->send($password);
    $result = $user->save($password);
    if($result>0 )$this->sukses();
    else $this->gagal();
  }else{
    $this->session->set_flashdata("Msginvoice", " Username sudah dipakai, cari yang lain");
    redirect(site_url('CUser/tUser'));
  }
}

  public function Konfirmasi_user($username)
  {
    $result = $this->User->konfirmasi_user($username);
    if($result>0){
      $this->session->set_flashdata("MsgregistSukses", "Pendaftaran Berhasil");
      redirect(site_url('CFLogin/index'));
    }else{
      $this->session->set_flashdata("MsgregistGagal", " Username sudah dipakai, cari yang lain");
      redirect(site_url('CFLogin/index'));
    }
  }

  public function tUser()
  {
    $data['role']=$this->Role->getAll();
    $data['title']= "User";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/User/tUser',$data);
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CUser/index');


    $user = $this->User;
    $data['role']=$this->Role->getAll();
    $data["user"]=$user->getByID($id);
    $data['role']=$this->Role->getAll();
    $data['title']= "User";
    $this->load->view('Administrator/header',$data);
    $this->load->view('Administrator/User/eUser',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {

    $result = $this->User->update();
    if($result>0)$this->sukses();
    else $this->gagal();
  }

  public function updateProfil()
  {
    $post = $this->input->post();
    if($post["username"] != $this->session->userdata('user_username')){
      $this->form_validation->set_rules('username','Username','is_unique[user.username]');

      if ($this->form_validation->run() == TRUE){
      $result = $this->User->updateProfil();
      if($result>0){
        $this->session->set_flashdata("globalmsgsuccess", "Sukses");
        echo "<script>window.history.back();location.reload();</script>";
      }
      else {
        $this->session->set_flashdata("globalmsggagal", "Gagal");
        echo "<script>window.history.back();location.reload();</script>";
      }
    }else{
      $this->session->set_flashdata("Msginvoice", " Username sudah dipakai, cari yang lain");
      echo "<script>window.history.back();location.reload();</script>";
    }
  }else{
    $result = $this->User->updateProfil();
    if($result>0){
      $this->session->set_flashdata("globalmsgsuccess", "Sukses");
      echo "<script>window.history.back();location.reload();</script>";
    }
    else {
      $this->session->set_flashdata("globalmsggagal", "Gagal");
      echo "<script>window.history.back();location.reload();</script>";
    }
  }

  }

  public function delete($id)
  {
      if(!isset($id))redirect('CUser/index');
      if($this->User->delete($id))$this->sukses();
      else $this->gagal();
  }

  public function active($id)
  {
      if(!isset($id))redirect('CUser/index');
      if($this->User->active($id)){
        $this->sukses();
      }else{
        $this->gagal();
      }
  }

  public function sukses()
  {
    $this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CUser/index'));
  }

  public function gagal()
  {
    $this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CUser/index'));
  }


  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


  public function send($password){
    $this->load->library('mailer');

    $email_penerima = $this->input->post('Email');
    $isiUsername = $this->input->post('Username');
    $isiPassword = $password;
    $isiRole     = $this->Role->getByID($this->input->post('IDRole'));


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
    echo "<br /><a href='".site_url("CDashboard")."'>Kembali ke Form</a>";
  }


  public function get_user_data()
  {
      $id = $this->input->get('id');
      $get_user = $this->User->getByID($id);
      echo json_encode($get_user);
      exit();
  }



}
