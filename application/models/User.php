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
    $this->db->select('u.*,r.Deskripsi as Deskripsi');
    $this->db->from('user u');
    $this->db->join('role as r', 'u.IDRole = r.IDRole');
    $query = $this->db->get();
    return $query->result();
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
    $this->foto = $this->_uploadImage();
	  $this->status = 1;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }


  public function save_user()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
		$this->Nama = $post["nama"];
		//$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["notelp"];
		//$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["email"];
    $this->username = $post["Username"];
    $this->password = $post["password"];
    $this->IDRole = 3;
    $this->jeniskelamin = $post["jeniskelamin"];
    $this->foto = '';
	  $this->status = 2;
    $this->createby = 1;
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function konfirmasi_user($user)
  {
    $this->status = 1;
    return $this->db->update($this->_table,$this,array('username'=>$user));
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $this->IDUser = $post["IDUser"];
		$this->Nama = $post["Nama"];
		$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["NoTelp"];
		$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["Email"];
    $this->IDRole = $post["IDRole"];
    $this->jeniskelamin = $post["jk"];
		//$this->username = $post["username"];
		//$this->password = $post["password"];
    //$this->status = 1;
    $this->modifiedby = $this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDUser'=>$post['IDUser']));
  }

  public function updateProfil()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $this->IDUser = $post["IDUser"];
		$this->Nama = $post["Nama"];
		$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["NoTelp"];
		$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["Email"];
		$this->username = $post["username"];

    if(isset($post['gantipassword'])){
      $this->password = $post["repassword"];
    }else{
      $this->password = $post["old_pass"];
    }

    $this->jeniskelamin = $post["jk"];
    //$this->foto = $this->_uploadImage($_FILES['foto']['name']);
    if (!empty($_FILES["foto"]["name"])) {
        $this->Foto = $this->_uploadImage();
    } else {
        $this->Foto = $post["old_foto"];
    }
    //$this->status = 1;
    $this->modifiedby = $this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDUser'=>$post['IDUser']));
  }

  public function delete($IDUser)
  {
    $this->status = 0;
    $this->modifiedBy = $this->session->userdata('user_userID');
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDUser'=>$IDUser));
  }

  public function active($IDUser)
  {
    $this->status = 1;
    $this->modifiedBy = $this->session->userdata('user_userID');
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDUser'=>$IDUser));
  }

  private function _uploadImage()
  {
    $config['upload_path']          = './upload/profil/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $this->username;
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
