<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Konf_Transaksi extends CI_Model
{
	private $_table ="transaksi";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Management');
	}

	public function getAll()
	{
		$this->db->select('t.IDTransaksi,t.tanggal,dt.IDObat,dt.subTotal,dt.Jumlah, o.namaObat, t.totalBayar, t.status');
		$this->db->from('transaksi t');
		$this->db->join('detailtransaksi as dt', 't.IDTransaksi=dt.IDTransaksi');
		$this->db->join('obat as o', 'o.IDObat = dt.IDObat');

		$query = $this->db->get();
		return $query->result();
	}

	public function getTrans()
	{
    return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		//masih belum yang lainnya
		// update status doang

		foreach($this->cart->contents() as $item)
		{
			$data=array(
			'IDTransaksi' => $idTransaksi,
			'IDObat' => $item['id'],
			'jumlah' => $item['qty'],
			'subTotal' => $item['subtotal']
			);
			$Total = (Double)$this->Management->getLastData() - (Double)$totalBayar;
		  $this->db->insert('detailtransaksi',$data );
		}

	$this->cart->destroy();

	return true;

	}





}



 ?>
