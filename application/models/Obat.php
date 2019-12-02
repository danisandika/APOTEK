<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Model
{
  private $_table = "obat";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get_where($this->_table,["Status"=>1])->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDObat"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->namaObat = $post["namaObat"];
		$this->IDJenis = $post["IDJenis"];
		$this->JumlahObat = $post["JumlahObat"];
		$this->keterangan = $post["keterangan"];
		$this->IDLokasi = $post["IDLokasi"];
		$this->Satuan = $post["satuan"];
		$this->Harga = $post["harga"];
		$this->Expired = $post["Expired"];
		$this->Foto = $this->_uploadImage($_FILES['foto']['name']);

    $this->status = 1;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
    $this->IDObat = $post["IDObat"];
		$this->namaObat = $post["namaObat"];
		$this->IDJenis = $post["IDJenis"];
		$this->JumlahObat = $post["JumlahObat"];
		$this->Keterangan = $post["Keterangan"];
		$this->IDLokasi = $post["IDLokasi"];
		$this->Satuan = $post["Satuan"];
		$this->Harga = $post["Harga"];
		$this->Expired = $post["Expired"];
		$this->Foto = $post["Foto"];
    $this->status = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDObat'=>$post['IDObat']));
  }

  public function delete($IDObat)
  {
    $post = $this->input->post();
    $this->Status = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDObat'=>$IDObat));
  }

  private function _uploadImage($namagambar)
  {
    $config['upload_path']          = './upload/obat/';
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
