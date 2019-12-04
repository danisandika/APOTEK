<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Model
{
  private $_table = "Info";

  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get_where($this->_table,array('createBy' => $this->session->userdata('user_userID'), 'status' => 1))->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDInfo"=>$id])->row();
  }

  public function save()
  {

    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
		$this->Judul = $post["judul"];
    $this->Kategori = $post["kategori"];
    $this->Konten = $post["konten"];
    $this->gambar = $this->_uploadImage($_FILES['gambar']['name']);
    $this->waktuPost = $dateNow;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
    $this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();

    $this->IDInfo = $post["IDInfo"];
		$this->Judul = $post["Judul"];
		$this->gambar = $post["gambar"];
		$this->Konten = $post["konten"];
    $this->status = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDInfo'=>$post['IDInfo']));
  }

  public function delete($IDInfo)
  {
    $this->status = 0;
    $this->modifiedBy = 1;
    $this->CreateDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDInfo'=>$IDInfo));
  }

  private function _uploadImage($namagambar)
  {
    $config['upload_path']          = './upload/info/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
  }

}
