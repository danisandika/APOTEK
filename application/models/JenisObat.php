<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisObat extends CI_Model
{
  private $_table = "jenisobat";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get_where($this->_table,["statusJenis"=>1])->result();
    //return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDJenis"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
		$this->namaJenis = $post["namaJenis"];
		$this->Deskripsi = $post["Deskripsi"];
    $this->statusJenis = 1;
    $this->createby = 1;
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d");
    $post = $this->input->post();
    $this->IDJenis = $post["IDJenis"];
    $this->namaJenis = $post["namaJenis"];
		$this->Deskripsi = $post["Deskripsi"];
    $this->statusJenis = 1;
    $this->modifiedby = 1;
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDJenis'=>$post['IDJenis']));
  }

  public function delete($IDJenis)
  {
    $this->statusJenis = 0;
    $this->modifiedBy = 1;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDJenis'=>$IDJenis));
  }

}
