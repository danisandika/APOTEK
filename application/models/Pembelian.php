<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Model
{
  private $_table = "Pembelian";


  public function __construct()
  {
        parent::__construct();
        $this->load->model('Management');
  }

  public function getAll()
  {
    $this->db->select('IDObat,namaObat,namaJenis,Nama_Lokasi,JumlahObat,Harga,o.status as statusObat,Expired,Keterangan,Satuan');
    $this->db->from('obat as o');
    $this->db->join('jenisobat as jo', 'jo.IDJenis = o.IDJenis');
    $this->db->join('lokasi_penyimpanan as lp', 'lp.IDLokasi = o.IDLokasi');
    //$this->db->get_where($this->_table)->result();
    $query = $this->db->get();
    return $query->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function save(){

    $dateNow = date("Y-m-d H:i:s");
    $idBeli = "PM".date("YmdHis");
    $post = $this->input->post();

    $TotalBayar =$this->cart->total();
    $supplier = $post["IDSupplier"];
    $userID = $this->session->userdata('user_userID');


    $this->IDPembelian = $idBeli;
    $this->Tanggal = $dateNow;
    $this->totalBayar = $TotalBayar;
    $this->IDSupplier = $supplier;
    //$this->status = 1;
    $this->IDKaryawan = $userID;
    $this->db->insert($this->_table,$this);


    foreach ($this->cart->contents() as $item) {
    $data=array(
    'IDPembelian' => $idBeli,
    'IDObat' => $item['id'],
    'jumlah' => $item['qty'],
    'status' => 1,
    'subTotal' => $item['subtotal']
    );
	$Total = (Double)$this->Management->getLastData() - (Double)$TotalBayar;
    $this->db->insert('detailpembelian',$data);

    }

    $management=array(
      'tanggalTransaksi'=>$dateNow,
      'Debit'=>0,
      'Kredit'=>$TotalBayar,
      'Total'=>$Total,
      'Deskripsi'=>'Pembelian Obat',
      'CreateBy'=>$userID,
      'CreateDate'=>$dateNow
    );
    $this->db->insert('management_uang',$management);
    $this->cart->destroy();

return true;
}



}
