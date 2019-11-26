<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model
{
  private $_table = "Role";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    //return $this->db->get($this->_table)->result();
    return $this->db->get_where($this->_table,["status"=>1])->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDRole"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
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
    $this->IDRole = $post["IDRole"];
    $this->Deskripsi = $post["Deskripsi"];
    $this->status = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDRole'=>$post['IDRole']));
  }

  public function delete($IDRole)
  {
    $this->status = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDRole'=>$IDRole));
  }

}
