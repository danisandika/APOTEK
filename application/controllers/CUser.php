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
    $password = $this->generateRandomString();
    $user = $this->User;
    $sendEmail = $this->send($password);
    $result = $user->save($password);
    if($result>0 && $sendEmail>0)$this->sukses();
    else $this->gagal();
  }

  public function tUser()
  {
    $data['role']=$this->Role->getAll();
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/User/tUser',$data);
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CUser/index');

    $user = $this->User;
    $data["user"]=$user->getByID($id);
    $data['role']=$this->Role->getAll();
    $data['title']= "User";
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/User/eUser',$data);
    $this->load->view('Administrator/footer');
  }

  public function update()
  {
    $result = $this->User->update();
    if($result>0)$this->sukses();
  }

  public function delete($id)
  {
      if(!isset($id))redirect('CUser/index');
      if($this->User->delete($id)){
        redirect(site_url('Dashboard/index'));
      }
  }

  public function sukses()
  {
    redirect(site_url('CUser/index'));
  }

  public function gagal()
  {
    echo "<script>alert('Data Gagal Ditambahkan');</script>";
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



}
