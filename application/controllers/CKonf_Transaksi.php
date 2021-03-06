 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CKonf_Transaksi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Transaksi");
		$this->load->model("Konf_Transaksi");
		$this->load->library("session");
		$this->load->library("cart");
    $this->load->model("Count");

	}


	public function index()
	{
    if(isset($_FILES['FotoResep']['name'])){
    $data['FotoResep']=$_FILES['FotoResep']['name'];
    $this->_uploadImage($_FILES['FotoResep']['name']);
    }
		$data['datatran']=$this->Konf_Transaksi->getAll();
		$data['detail']=$this->Konf_Transaksi->getAll();
    $data['countbooking']=$this->Count->getcountbk('booking');
    $data['countjumlahobat']=$this->Count->getcountJumlahObat();
		$data['countexpired']=$this->Count->getcountExpired();
		$data['title']= "Konfirmasi";
		$this->load->view('Karyawan/header',$data);
		$this->load->view('Karyawan/Transaksi/konfirmTransaksi',$data);
		$this->load->view('Karyawan/footer');
	}

  private function _uploadImage($namagambar)
	{
    $config['upload_path']          = './upload/transaksi/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']						= true;
    $config['max_size']             = 1024;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('FotoResep')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
	}

	public function add_cart()
	{
	  $this->load->view('Karyawan/header');
    $data = array(
	//'id'=>$this->input->post('id_obat'),
    //'name'=>$this->input->post('namaobat'),
	'price'=>$this->input->post('harga'),
    //'qty'=>$this->input->post('jumlah'),
    );
	$this->cart->insert($data);

	echo $this->show_cart();
	}

	function show_cart()
	{
		$output = '';
		$no     = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
								<tr>
								  <td hidden>'.$items['id'].'</td>
									<td>'.$items['name'].'</td>
									<td>Rp.'.$items['price'].'</td>
									<td>'.$items['qty'].'</td>
									<td>Rp.'.number_format($items['subtotal']).'</td>
									<td><button type="button" id="'.$items['rowid'].'" class="remove_cart btn btn-danger btn-sm">Batal</button></td>
								</tr>
								';
		}
		$output .= '
								<tr>
									<th colspan="4">Total</th>
									<th colspan="2">'.'Rp'.number_format($this->cart->total()).'</th>
								</tr>
								';
								return $output;
	}



	function load_cart()
	{
		echo $this->show_cart();
	}

	function delete_cart(){
		$data = array(
			'rowid'=>$this->input->post('row_id'),
			'qty'=>0,
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	public function tambah()
	{
	$transaksi = $this->Transaksi;
    $result = $transaksi->save();
    if($result>0)$this->sukses();
    else $this->gagal();
	}


	public function sukses()
	{
	$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CKonfirmasi/indexpembelian'));
	}

 	public function gagal()
	{
	$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CKonfirmasi/indexpembelian'));
	}



}

?>
