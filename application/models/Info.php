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

    return $this->db->get_where($this->_table,array('createBy' => $this->session->userdata('user_userID')))->result();
  }

  public function getAllbyMember()
  {
    $this->db->select('*,date_format(waktuPost,"%d") as tanggal,date_format(waktuPost,"%M") as bulan')
             ->from('info')
             ->where('status',1);
     $query = $this->db->get();
     return $query->result();
  }

  public function getByMemberID($id)
  {
    $this->db->select('info.*,date_format(waktuPost,"%H:%i:%s %d %M %Y") as tanggal,user.Nama as name,user.foto as poto')
             ->from('info')
             ->where('info.status',1)
             ->where('info.IDInfo',$id)
             ->join('User','User.IDUser = info.createBy');
    $query = $this->db->get();
    return $query->row();
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
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();

    $this->IDInfo = $post["IDInfo"];
		$this->Judul = $post["Judul"];
		//$this->gambar = $post["gambar"];
    if (!empty($_FILES["gambar"]["name"])) {
        $this->gambar = $this->_uploadImage($_FILES['gambar']['name']);
    } else {
        $this->gambar = $post["old_gambar"];
    }
		$this->Konten = $post["konten"];
    //$this->status = 1;
    $this->modifiedby =$this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDInfo'=>$post['IDInfo']));
  }

  public function delete($IDInfo)
  {
    $this->status = 0;
    $this->modifiedBy = $this->session->userdata('user_userID');
    $this->CreateDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDInfo'=>$IDInfo));
  }

  public function active($IDInfo)
  {
    $this->status = 1;
    $this->modifiedBy = $this->session->userdata('user_userID');
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
