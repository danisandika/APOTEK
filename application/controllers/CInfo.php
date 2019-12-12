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
		 $this->load->helper(array('string','text'));
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


	    if(!isset($id))redirect('CInfo/index');

	    $info = $this->Info;
	    $data["info"]=$info->getByID($id);
	    $data['title']= "Info";
	    $this->load->view('Administrator/header');
	    $this->load->view('Administrator/Info/eInfo',$data);
	    $this->load->view('Administrator/footer');
	  }

	  public function update()
	  {

	    $result = $this->Info->update();
	    if($result>0){
				$this->sukses();
			}else{
				$this->gagal();
			}
	  }

	  public function delete($id)
	  {
	      if(!isset($id))redirect('CInfo/index');
	      if($this->Info->delete($id)){
					$this->sukses();
				}else{
					$this->gagal();
				}
	  }

		public function active($id)
	  {
	      if(!isset($id))redirect('CInfo/index');
	      if($this->Info->active($id)){
					$this->sukses();
				}else{
					$this->gagal();
				}
	  }

	  public function sukses()
	  {
			$this->session->set_flashdata("globalmsgsuccess", "Sukses");
	    redirect(site_url('CInfo/index'));
	  }

	  public function gagal()
	  {
			$this->session->set_flashdata("globalmsggagal", "Gagal");
	    redirect(site_url('CInfo/index'));
	  }

		public function get_info_data()
		{
		    $id = $this->input->get('id');
		    $get_info = $this->Info->getByID($id);
		    echo json_encode($get_info);
		    exit();
		}

}
