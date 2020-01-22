<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model
{
	private $_table ="transaksi";

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Management');
				$this->load->model('Transaksi');
	}

	public function getAll()
	{
		$this->db->select('IDObat,namaObat,namaJenis,Nama_Lokasi,JumlahObat,Harga,o.status as statusObat,Expired,Keterangan,Satuan');
		$this->db->from('obat o');
		$this->db->join('jenisobat as jo', 'jo.IDJenis = o.IDJenis');
		$this->db->join('lokasi_penyimpanan as lp', 'lp.IDLokasi = o.IDLokasi');
		$this->db->where ('o.JumlahObat >0');
		$this->db->where ('o.status =1');
		$query = $this->db->get();
		return $query->result();
	}

	public function save()
	{
		$dateNow = date("Y-m-d H:i:s");
		$idTransaksi="TR".date("YmdHis");
		$post =$this->input->post();

		$totalBayar=0;

		foreach ($this->Transaksi->showCart() as $items) {

		}
		$userID =$this->session->userdata('user_userID');

		$this->IDTransaksi = $idTransaksi;
		$this->Tanggal = $dateNow;
		$this->totalBayar = $totalBayar;
		$this->status = 0;
		$this->IDKaryawan =$userID;
		if(isset($_FILES['FotoResep']['name'])){
			$this->FotoResep = $this->_uploadImage($idTransaksi);
		}

		$this->db->insert($this->_table,$this);

		foreach($this->Transaksi->showCart() as $item)
		{
			$data=array(
			'IDTransaksi' => $idTransaksi,
			'IDObat' => $item->id_obat,
			'jumlah' => $item->jumlah,
			'subTotal' => $item->subTotal
			);

			$jmlobat = $this->getJumlahData($item->id_obat) - $item->jumlah;
			if ($jmlobat < 0) {
				$this->session->set_flashdata("Msginvoice", "Stok Obat Tidak Memenuhi");
	      echo "<script>window.history.back();location.reload();</script>";
			}else{
				$jumObat = array(
					'JumlahObat'=>$this->getJumlahData($item->id_obat) - $item->jumlah
				);
				$totalBayar = $totalBayar + $items->subTotal;
				$this->db->update("obat",$jumObat,array('IDObat'=>$item->id_obat));
				//$Total = (Double)$this->Management->getLastData() - (Double)$totalBayar;
			  $this->db->insert('detailtransaksi',$data );
				$this->deleteKeranjang($item->id_obat);
			}
		}


  $Total = (Double)$this->Management->getLastData() + (Double)$totalBayar;
    //$this->db->insert('detailtransaksi',$data );

	$management=array(
      'tanggalTransaksi'=>$dateNow,
      'Debit'=>$totalBayar,
      'Kredit'=>0,
      'Total'=>$Total,
      'Deskripsi'=>'Penjualan Obat ID:'.$idTransaksi,
      'CreateBy'=>$userID,
      'CreateDate'=>$dateNow
    );
    $this->db->insert('management_uang',$management);

		$updatetrans=array(
			'totalBayar'=>$totalBayar
		);
		$this->db->update('transaksi',$updatetrans,array('IDTransaksi'=>$idTransaksi));
		return true;
	}

	public function deleteKeranjang($id){
	$this->db->where('id_obat', $id);
  $this->db->delete('keranjang_jual');
	}

	public function cekDataSama($ido)
	{
	  $this->db->select('*');
	  $this->db->from('keranjang_jual');
	  $this->db->where('id_obat',$ido);
	  return $this->db->get()->row();
	}


	public function getJumlahData($id)
  {
    $this->db->select('JumlahObat');
    $this->db->from('obat');
		$this->db->where('IDObat',$id);
    $this->db->limit(1);
    $query = $this->db->get()->row()->JumlahObat;
    return $query;
  }

	public function insertCart($data)
  {
    $this->db->insert('keranjang_jual',$data);
  }

	public function updateKeranjang($ido,$data)
	{
	  return $this->db->update('keranjang_jual',$data,array('id_obat'=>$ido));
	}

	public function showCart()
	{
	  $this->db->select('*')
	           ->from('keranjang_jual');
	  $query = $this->db->get();
	  return $query->result();
	}

	public function deleteCart($id)
	{
	  $this->db->where('id', $id);
	  $this->db->delete('keranjang_jual');
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
