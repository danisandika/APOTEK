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


	private $_table = "login";
    
	public function tambah()
    {
    $user = $this->User;
    $result = $user->save();
	
    if($result>0)$this->sukses();
    else $this->gagal();
	
	
  }

  public function tUser()
  {
    $this->load->view('Administrator/header');
    $this->load->view('Administrator/User/tUser');
    $this->load->view('Administrator/footer');
  }


  public function edit($id=null)
  {

    if(!isset($id))redirect('CUser/index');

    $user = $this->User;
    $data["user"]=$user->getByID($id);
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
  
  


}
