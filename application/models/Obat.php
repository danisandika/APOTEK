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
		$this->Foto = $post["foto"];
		
    $this->status = 1;
    $this->createby = 1;
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

}
