<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTransaksi extends CI_Controller{

	 public function __construct()
	 {
		parent::__construct();
		$this->load->model("Transaksi");
		$this->load->model("Supplier");
		$this->load->library("session");
		$this->load->library("cart");
		$this->load->model("Count");
		if($this->session->userdata('user_role') != 'Karyawan')
		{
			 echo "<script language='javascript'>alert('Anda Bukan Karyawan');</script>";
			 redirect(base_url('CLogin'));
		}

	 }

	public function index()
	{
		$data['datatran']=$this->Transaksi->getAllObat();
		$data['countbooking']=$this->Count->getcountbk('booking');
		$data['countjumlahobat']=$this->Count->getcountJumlahObat();
		$data['countexpired']=$this->Count->getcountExpired();
		$data['title']= "Transaksi";
		$this->load->view('Karyawan/header',$data);
		$this->load->view('Karyawan/Transaksi/trTransaksi',$data);
		$this->load->view('Karyawan/footer');
	}


	public function add_cart()
	{
		$cekjumlah = $this->Transaksi->getJumlahData($this->input->post('id_obat')) - $this->input->post('jumlah');
		if($cekjumlah >= 0)
		{
		$cekData = $this->Transaksi->cekDataSama($this->input->post('id_obat'));
		//echo "<script>alert($this->input->post('id_obat'));</script>";
		if(empty($cekData)){
		$subtotal = $this->input->post('harga')*$this->input->post('jumlah');
    $data = array(
			'id_obat'=>$this->input->post('id_obat'),
    	'nama_obat'=>$this->input->post('namaobat'),
			'harga'=>$this->input->post('harga'),
    	'jumlah'=>$this->input->post('jumlah'),
			'subTotal'=>$subtotal
    );
	$this->Transaksi->insertCart($data);
	}else{
		$jumlah  = $cekData->jumlah+$this->input->post('jumlah');
		$subtotal= $jumlah*$this->input->post('harga');
		$data = array(
			'jumlah'=>$jumlah,
			'subTotal'=>$subtotal
		);
		$this->Transaksi->updateKeranjang($this->input->post('id_obat'),$data);
	}
		echo $this->show_cart();
	}
}



	function show_cart()
	{
		$output = '';
		$no     = 0;
		$totalBayar = 0;
		$query = $this->Transaksi->showCart();
		foreach ($query as $items) {
			$no++;
			$output .='
								<tr>
								  <td hidden>'.$items->id_obat.'</td>
									<td>'.$items->nama_obat.'</td>
									<td> Rp.'.number_format($items->harga).'</td>
									<td>'.$items->jumlah.'</td>
									<td> Rp.'.number_format($items->subTotal).'</td>
									<td><button type="button" id="'.$items->id.'" class="remove_cart btn btn-danger btn-sm">Batal</button></td>
								</tr>
								';
		 $totalBayar = $totalBayar + $items->subTotal;
		}
		$output .= '
								<tr>
									<th colspan="4">Total</th>
									<th colspan="2">'.'Rp.'.number_format($totalBayar).'</th>
								</tr>
								';
	  return $output;
	}

	function load_cart()
	{
		echo $this->show_cart();
	}

	function delete_cart(){
		$data =$this->input->post('row_id');
		$this->Transaksi->deleteCart($data);
		echo $this->show_cart();
	}

	public function tambah()
	{
		$transaksi = $this->Transaksi;
    $result = $transaksi->save();
    if($result>0){
			$this->session->set_flashdata("globalmsgsuccess", "Sukses");
		   redirect(site_url('CTransaksi/index'));
		}
    else $this->gagal();

	}


	public function sukses()
	{
	$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CKonf_Transaksi/index'));
	}

  public function gagal()
  {
	$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CKonf_Transaksi/index'));
  }
}
?>
