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
    return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDSupplier"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->namaSupplier = $post["namaSupplier"];
		$this->alamatSupplier = $post["alamatSupplier"];
		$this->emailSupplier = $post["emailSupplier"];
		$this->noTelp = $post["telpSupplier"];
    $this->status = 1;
    $this->createby = 1;
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
    $this->IDSupplier = $post["IDSupplier"];
		$this->namaSupplier = $post["namaSupplier"];
		$this->alamatSupplier = $post["alamatSupplier"];
		$this->emailSupplier = $post["emailSupplier"];
		$this->noTelp = $post["telpSupplier"];
    $this->status = 1;
		return $this->db->update($this->_table,$this,array('IDSupplier'=>$post['IDSupplier']));
  }

  public function delete($IDSupplier)
  {
    return $this->db->delete($this->_table,array('IDSupplier'=>$IDSupplier));
  }

}