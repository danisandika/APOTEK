<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Model
{
  public function __construct()
  {
        parent::__construct();
        $this->load->model('Obat');
  }

  public function getAll()
  {
    $this->db->select('p.IDPembelian,s.NamaSupplier,o.namaObat,o.IDObat,o.Satuan,ip.jumlah,ip.status,ip.subTotal');
    $this->db->from('detailpembelian as ip');
    $this->db->join('pembelian as p', 'ip.IDPembelian = p.IDPembelian');
    $this->db->join('Supplier as s', 's.IDSupplier = p.IDSupplier');
    $this->db->join('Obat as o', 'o.IDObat = ip.IDObat');
    $this->db->where('ip.status', 1);
    //$this->db->get_where($this->_table)->result();
    $query = $this->db->get();
    return $query->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function ubah_pembelian()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $IDPembelian = $post["idp"];
    $IDObat = $post["id"];

    $this->IDObat = $IDObat;
    $jumlah= $post["jumlah"];

    $jumlahObat = $this->db->get_where('obat',array('IDObat'=>$IDObat))->row();
    $this->JumlahObat = $jumlahObat->JumlahObat + $jumlah ;
    $this->Expired = $post["tanggal"];
    //$this->status = 1;
    $data_detail = array(
      'IDPembelian'=>$IDPembelian,
      'IDObat'=>$IDObat,
      'status'=>0
    );

    $this->db->update("detailpembelian",$data_detail,array('IDPembelian'=>$IDPembelian,'IDObat'=>$IDObat));
		return $this->db->update("obat",$this,array('IDObat'=>$IDObat));
  }

}
