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



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->Nama = $post["Nama"];
		$this->Alamat = $post["Alamat"];
		$this->NoTelp = $post["NoTelp"];
		$this->TglLahir = $post["TglLahir"];
		$this->Email = $post["Email"];
	$this->status = 1;
    $this->createby = 1;
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

}
