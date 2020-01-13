<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Model
{
  private $_table = "obat";


  public function __construct()
  {
        parent::__construct();
        $this->load->model("Management");
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
    $this->db->where('IDCustomer',$this->session->userdata('user_userID'));
    $this->db->where('statusBooking !=',0);
    //$this->db->get_where($this->_table)->result();
    $query = $this->db->get();
    return $query->result();
  //  return $this->db->get($this->_table)->result();
  }


  public function getAllBookingbyKaryawan()
  {
    $this->db->select('*');
    $this->db->from('booking b');
    $this->db->join('User as c', 'c.IDUser = b.IDCustomer');
    $this->db->where('statusBooking !=',0);
    $this->db->where('statusBooking !=',3);
    $query = $this->db->get();
    return $query->result();
  }

  public function getInvoiceBooking($id)
  {
    $this->db->select('*');
    $this->db->from('booking b');
    $this->db->join('User as c', 'c.IDUser = b.IDCustomer');
    $this->db->where('IDBooking',$id);
    $query = $this->db->get();
    return $query->row();
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

    foreach ($this->showCart($this->session->userdata('user_userID')) as $item) {
    $data=array(
    'IDTransaksi' => $IDTransaksi,
    'IDObat' => $item->id_obat,
    'Jumlah' => $item->jumlah,
    'subTotal' => $item->subTotal
    );
    $this->deleteCart($item->id_obat);
    $this->db->insert('detailtransaksi',$data);

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

public function updateKeranjang($idu,$ido,$data)
{
  return $this->db->update('keranjang',$data,array('id_obat'=>$ido,'id_user'=>$idu));
}

public function cekDataSama($idu,$ido)
{
  $this->db->select('*');
  $this->db->from('keranjang');
  $this->db->where('id_obat',$ido);
  $this->db->where('id_user',$idu);
  return $this->db->get()->row();
}

public function showCart($user)
{
  $this->db->select('*')
           ->from('keranjang')
           ->where('id_user',$user);
  $query = $this->db->get();
  return $query->result();
}

public function deleteCart($id)
{
  $this->db->where('id_obat', $id);
  $this->db->where('id_user', $this->session->userdata('user_userID'));
  $this->db->delete('keranjang');
}

  public function getTotalByUser()
  {
      $totalBayar=0;
      foreach ($this->showCart($this->session->userdata('user_userID')) as $items) {
        $totalBayar = $totalBayar + $items->subTotal;
    }
    return $totalBayar;
  }

  public function insertCart($data)
  {
    $this->db->insert('keranjang', $data);
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


  public function detailsTransaksi($id)
  {
    $this->db->select('*');
    //$this->db->from('transaksi');
    //$query = $this->db->get();
    //return $query->result();
    return $this->db->get_where('transaksi',["IDTransaksi"=>$id])->row();
  // return $this->db->get($this->_table)->result();
  }

  public function detailsBooking($id)
  {
    $this->db->select('*');
    //$this->db->join('transaksi');
    //$query = $this->db->get();
    //return $query->result();
    return $this->db->get_where('booking',["IDBooking"=>$id])->row();
  // return $this->db->get($this->_table)->result();
  }


  public function konfirmasiTransfer()
  {
    $post = $this->input->post();
    $this->IDBooking = $post["idbooking"];
    $this->statusBooking = 2;
    if (!empty($_FILES["konfirmasigambar"]["name"])) {
        $this->FotoTransfer = $this->_uploadImage();
    } else {
        $this->FotoTransfer = $post["old_gambar"];
    }
    return $this->db->update('booking',$this,array('IDBooking'=>$post['idbooking']));
  }


  public function getdetailTransaksi($id)
  {
    $this->db->select('d.IDTransaksi as IDTransaksi,d.IDObat as IDObat,d.Jumlah as jumlah,d.subTotal as subTotal,o.namaObat as namaObat,o.Foto as Foto,o.Satuan as Satuan,o.Harga as harga');
    $this->db->from('detailtransaksi as d');
    $this->db->join('Obat as o', 'o.IDObat = d.IDObat');
    $this->db->where('IDTransaksi', $id);
    $query = $this->db->get();
    return $query->result();
  }



  private function _uploadImage()
  {
    $config['upload_path']          = './upload/transfer/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $this->IDBooking;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('konfirmasigambar')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
  }



  public function submit_transaksi($noStatus)
  {
    $post = $this->input->post();
    $IDBooking = $post["IDBooking"];
    $strtrans = 'TR'.substr($IDBooking,2);
    $DeskripsiUang = 'Pemasukan dari hasil Penjualan Obat dengan ID : '.$strtrans;

    //Update Booking
    $this->statusBooking = $noStatus;
		$this->db->update('Booking',$this,array('IDBooking'=>$IDBooking));

    //Update Transaksi
    $arrayTransaksi=array(
    'IDKaryawan' => $this->session->userdata('user_userID'),
    'status' => 0
    );
    $this->db->update('transaksi',$arrayTransaksi,array('IDTransaksi'=>$strtrans));

    //Update Detail Transaksi
    foreach ($this->getdetailTransaksi($strtrans) as $item) {
    $obat = $this->db->get_where('obat',array('IDObat'=>$item->IDObat))->row();
    $data=array(
    'JumlahObat' => $obat->JumlahObat + $item->Jumlah
    );
    $this->db->update('obat',$data,array('IDObat'=>$item->IDObat));
    }

    //Management uang
    $Total = (Double)$this->Management->getLastData() + (Double)$post["totalBayar"];
    $uangNow = $this->Management->getLastData();
    $dataUang=array(
    'tanggalTransaksi' => date("Y-m-d H:i:s"),
    'Debit' => (Double)$post["totalBayar"],
    'Kredit' => 0,
    'Total' => $Total,
    'Deskripsi' => $DeskripsiUang,
    'CreateBy' => $this->session->userdata('user_userID'),
    'CreateDate' => date("Y-m-d H:i:s")
    );
    return $this->db->insert('Management_uang',$dataUang);

  }

}
