<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Model
{
  private $_table = "management_uang";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
    //return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDManagement"=>$id])->row();
  }



  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post    = $this->input->post();
    $jenis   = $post["jenisTransaksi"];
    $uangNow = $this->getLastData();
    if($jenis == "Pemasukan")
    {
      $this->Debit = $post["uang"];
      $this->Kredit= 0;
      $this->Total = (Double)$uangNow+$post["uang"];
    }
    elseif ($jenis == "Pengeluaran") {
      $this->Kredit= $post["uang"];
      $this->Debit = 0;
      $this->Total = (Double)$uangNow-$post["uang"];
    }
      $this->tanggalTransaksi = $dateNow;
      $this->Deskripsi = $post["Deskripsi"];
      $this->createby = $this->session->userdata('user_userID');
      $this->createDate = $dateNow;
      return $this->db->insert($this->_table,$this);
  }



  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $this->IDJenis = $post["IDJenis"];
    $this->namaJenis = $post["namaJenis"];
		$this->Deskripsi = $post["Deskripsi"];
    $this->statusJenis = $post["status"];
    $this->modifiedby = $this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDJenis'=>$post['IDJenis']));
  }

  public function delete($IDJenis)
  {
    $this->statusJenis = 0;
    $this->modifiedBy = $this->session->userdata('user_userID');;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDJenis'=>$IDJenis));
  }

  public function active($IDJenis)
  {
    $this->statusJenis = 1;
    $this->modifiedBy = $this->session->userdata('user_userID');;
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDJenis'=>$IDJenis));
  }

  public function getLastData()
  {
    $this->db->select('Total');
    $this->db->from($this->_table);
    $this->db->order_by('IDManagement','desc');
    $this->db->limit(1);
    $query = $this->db->get()->row()->Total;
    return $query;
  }

}
