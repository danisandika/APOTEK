<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Model
{
  private $_table = "info_kesehatan";


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
    return $this->db->get_where($this->_table,["IDInfo"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->Judul = $post["Judul"];
		$this->Foto = $post["Foto"];
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
    $this->IDInfo = $post["IDInfo"];
		$this->Judul = $post["Judul"];
		$this->Foto = $post["Foto"];
		$this->Deskripsi = $post["Deskripsi"];
    $this->status = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDInfo'=>$post['IDInfo']));
  }

  public function delete($IDInfo)
  {
    $this->status = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d");
    return $this->db->update($this->_table,array('IDInfo'=>$IDInfo));
  }

}
