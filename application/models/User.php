<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
  private $_table = "user";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDUser"=>$id])->row();
  }

  
  public function save($password)
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
		$this->Nama = $post["Nama"];
		$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["NoTelp"];
		$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["Email"];
    $this->username = $post["Username"];
    $this->password = $password;
    $this->IDRole = $post["IDRole"];
    $this->jeniskelamin = $post["jk"];
    $this->foto = $this->_uploadImage($_FILES['foto']['name']);
	  $this->status = 1;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
    $this->IDUser = $post["IDUser"];
		$this->Nama = $post["Nama"];
		$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["NoTelp"];
		$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["Email"];
		$this->username = $post["username"];
		$this->password = $post["password"];
    $this->status = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDUser'=>$post['IDUser']));
  }

  public function delete($IDSupplier)
  {
    $this->status = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d");
    return $this->db->update($this->_table,array('IDUser'=>$IDUser));
  }

  private function _uploadImage($namagambar)
  {
    $config['upload_path']          = './upload/profil/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
  }

}
