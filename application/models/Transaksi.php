<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model
{
	private $_table ="transaksi";
	
	public function __construct()
	{
        parent::__construct();
        $this->load->model('Management');
	}
	
	public function getAll()
	{
		$this->db->select('IDObat,namaObat,namaJenis,Nama_Lokasi,JumlahObat,Harga,o.status as statusObat,Expired,Keterangan,Satuan');
		$this->db->from('obat o');
		$this->db->join('jenisobat as jo', 'jo.IDJenis = o.IDJenis');
		$this->db->join('lokasi_penyimpanan as lp', 'lp.IDLokasi = o.IDLokasi');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function save()
	{
		$dateNow = date("Y-m-d H:i:s");
		$idTransaksi="TR".date("YmdHis");
		$post =$this->input->post();
		
		$totalBayar=$this->cart->total();
		$userID =$this->session->userdata('user_userID');
		
		$this->IDTransaksi = $idTransaksi;
		$this->Tanggal = $dateNow;
		$this->totalBayar = $totalBayar;
		$this->status = 1;
		$this->IDKaryawan =$userID;
		$this->FotoResep = $this->_uploadImage($_FILES['FotoResep']['name']);
		$this->db->insert($this->_table,$this);
		
		foreach($this->cart->contents() as $item)
		{
			$data=array(
			'IDTransaksi' => $idTransaksi,
			'IDObat' => $item['id'],
			'jumlah' => $item['qty'],
			'subTotal' => $item['subtotal']
			);
		}
    $Total = (Double)$this->Management->getLastData() - (Double)$totalBayar;
    $this->db->insert('detailtransaksi',$data);
	
	$management=array(
      'tanggalTransaksi'=>$dateNow,
      'Debit'=>0,
      'Kredit'=>$totalBayar,
      'Total'=>$Total,
      'Deskripsi'=>'Penjualan Obat',
      'CreateBy'=>$userID,
      'CreateDate'=>$dateNow
    );
    $this->db->insert('management_uang',$management);
    $this->cart->destroy();
	
	return true;
	}
	
	private function _uploadImage($namagambar)
	{
    $config['upload_path']          = './upload/transaksi/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']			= true;
    $config['max_size']             = 1024;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('FotoResep')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
	}

	
}




?>