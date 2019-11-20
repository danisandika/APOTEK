<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Model
{
  private $_table = "lokasi_penyimpanan";


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
    return $this->db->get_where($this->_table,["IDLokasi"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->Nama_Lokasi = $post["Nama_Lokasi"];
		$this->tempatLokasi = $post["tempatLokasi"];
		$this->Deskripsi = $post["Deskripsi"];
		$this->status = 1;
		$this->createby = 1;
		$this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
    $this->IDLokasi = $post["IDLokasi"];
		$this->Nama_Lokasi = $post["Nama_Lokasi"];
		$this->tempatLokasi = $post["tempatLokasi"];
		$this->Deskripsi = $post["Deskripsi"];
		$this->status = 1;
		return $this->db->update($this->_table,$this,array('IDLokasi'=>$post['IDLokasi']));
  }

  public function delete($IDLokasi)
  {
  {
    $this->status = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d");
    return $this->db->update($this->_table,array('IDLokasi'=>$IDLokasi));
  }

}
