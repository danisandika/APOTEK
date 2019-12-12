<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Model
{
  private $_table = "supplier";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get_where($this->_table)->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDSupplier"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
		$this->namaSupplier = $post["namaSupplier"];
		$this->alamatSupplier = $post["alamatSupplier"];
		$this->emailSupplier = $post["emailSupplier"];
		$this->noTelp = $post["telpSupplier"];
    $this->status = 1;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $this->IDSupplier = $post["IDSupplier"];
		$this->namaSupplier = $post["namaSupplier"];
		$this->AlamatSupplier = $post["alamatSupplier"];
		$this->emailSupplier = $post["emailSupplier"];
		$this->noTelp = $post["telpSupplier"];
    //$this->status = $post["status"];
    $this->modifiedby = $this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDSupplier'=>$post['IDSupplier']));
  }

  public function delete($IDSupplier)
  {
    $post = $this->input->post();
    $this->Status = 0;
    $this->modifiedBy = $this->session->userdata('user_userID');;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDSupplier'=>$IDSupplier));
  }

  public function active($IDSupplier)
  {
    $post = $this->input->post();
    $this->Status = 1;
    $this->modifiedBy = $this->session->userdata('user_userID');;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDSupplier'=>$IDSupplier));
  }

}
