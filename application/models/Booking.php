<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Model
{
  private $_table = "obat";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('obat');
    //$this->db->get_where($this->_table)->result();
    $query = $this->db->get();
    return $query->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function getAllBooking()
  {
    $this->db->select('*');
    $this->db->from('booking');
    //$this->db->get_where($this->_table)->result();
    $query = $this->db->get();
    return $query->result();
  //  return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDObat"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $IDBooking = "BO".date("YmdHis");
    $IDTransaksi="TR".date("YmdHis");
    $IDMember = $post["iduser"];

    $this->IDTransaksi = $IDTransaksi;
    $this->Tanggal = $dateNow;
    $this->status = 1;
    $this->totalBayar = $this->getTotalByUser();
    $this->db->insert('transaksi',$this);

    foreach ($this->cart->contents() as $item) {
    if ($item['options']['user_id']==$this->session->userdata('user_userID')) {

    $data=array(
    'IDTransaksi' => $IDTransaksi,
    'IDObat' => $item['id'],
    'Jumlah' => $item['qty'],
    'subTotal' => $item['subtotal']
    );
    $this->cart->remove($item['rowid']);
    $this->db->insert('detailtransaksi',$data);
  }
  }

  $nama_bank = "-";
  if(!empty($post["nama_bank"])){$nama_bank = $post["nama_bank"];}

  $databooking = array(
    'IDBooking'=>$IDBooking,
    'dateBooking'=>$dateNow,
    'IDCustomer'=>$IDMember,
    'statusBooking'=>1,
    'IDTransaksi'=>$IDTransaksi,
    'MetodePembayaran'=>$post["radio1"],
    'nama_bank'=> $nama_bank,
    'Deskripsi'=>$post["deskripsi"]
  );

  $this->db->insert('booking',$databooking);

}


  public function getTotalByUser()
  {
      $totalBayar=0;
      foreach ($this->cart->contents() as $items) {
      if ($items['options']['user_id']==$this->session->userdata('user_userID')) {
        $totalBayar = $totalBayar + $items['subtotal'];
      }
    }
    return $totalBayar;
  }



  public function detailsObat($id)
  {
    $this->db->select('o.IDObat as IDObat,o.namaObat as namaObat,namaJenis,Nama_Lokasi,o.JumlahObat as JumlahObat,o.Harga as Harga,o.Keterangan as Keterangan,o.Satuan as Satuan,o.Foto as Foto,o.Expired as Expired');
    $this->db->from('obat as o');
    $this->db->join('jenisobat as jo', 'jo.IDJenis = o.IDJenis');
    $this->db->join('lokasi_penyimpanan as lp', 'lp.IDLokasi = o.IDLokasi');
    //$query = $this->db->get();
    //return $query->result();
    return $this->db->get_where($this->_table,["o.IDObat"=>$id,"o.status"=>"1"])->row();
  // return $this->db->get($this->_table)->result();
  }






  private function _uploadImage($namagambar)
  {
    $config['upload_path']          = './upload/obat/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
  }

}
