<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CFBooking extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



  public function __construct()
  {
    parent::__construct();
    $this->load->model("User");
    $this->load->model("Booking");
    $this->load->library("session");
  }

  public function index()
  {
    $data['obat']=$this->Booking->getAll();
    $data['title']= "User";
    $this->load->view('User/Member/header',$data);
    $this->load->view('User/Member/ListObat');
    $this->load->view('User/Member/footer');
  }

  public function index2()
  {
    $data['booking']=$this->Booking->getAllBooking();
    $data['title']= "Transaksi Saya";
    $this->load->view('User/Member/header',$data);
    $this->load->view('User/Member/vTransaksi',$data);
    $this->load->view('User/Member/footer');
  }

  public function index3($id)
  {
    $data['booking']=$this->Booking->detailsBooking($id);
    $data['title']= "Konfirmasi Transfer";
    $this->load->view('User/Member/header',$data);
    $this->load->view('User/Member/vTransfer',$data);
    $this->load->view('User/Member/footer');
  }


  public function konfirmasiTransfer()
  {
    $result = $this->Booking->konfirmasiTransfer();
    if($result>0)$this->sukses();
    else $this->gagal();
  }




  public function tTransaksi()
  {
    $data['user']=$this->User->getByID($this->session->userdata('user_userID'));
    $data['title']= "Transaksi";
    $this->load->view('User/Member/header',$data);
    $this->load->view('User/Member/tTransaksi',$data);
    $this->load->view('User/Member/footer');
  }

  public function tambah()
  {
      $booking = $this->Booking;
      $result = $booking->save();
      if($result>0)$this->sukses();
      else $this->gagal();
  }

  public function detailsObat($id=null)
  {

    if(!isset($id))redirect('CFBooking/index');

    $booking = $this->Booking;
    $data['obat']=$this->Booking->detailsObat($id);
    $data['title']= "Detail Obat";
    $this->load->view('User/Member/header');
    $this->load->view('User/Member/ListDetailObat',$data);
    $this->load->view('User/Member/footer');
  }

  public function detailsTransaksi($id=null)
  {

    if(!isset($id))redirect('CFBooking/index');
    $strbk = 'TR'.substr($id,2);
    $booking = $this->Booking;
    //$data['obat']=$this->Booking->detailsObat($id);
    $data['transaksi']=$this->Booking->detailsTransaksi($strbk);
    $data['booking']=$this->Booking->detailsBooking($id);
    $data['getdetail']=$this->Booking->getdetailTransaksi($strbk);
    $data['title']= "Detail Transaksi";
    $this->load->view('User/Member/header');
    $this->load->view('User/Member/vDetailTransaksi',$data);
    $this->load->view('User/Member/footer');
  }

  public function add_cart()
  {
    $cekData = $this->Booking->cekDataSama($this->session->userdata('user_userID'),$this->input->post('id_obat'));
    if(empty($cekData))
    {
      $subtotal = $this->input->post('harga')*$this->input->post('jumlah');
      $data = array(
  			'id_obat'=>$this->input->post('id_obat'),
        'id_user'=>$this->session->userdata('user_userID'),
  			'nama_obat'=>$this->input->post('namaobat'),
  			'harga'=>$this->input->post('harga'),
  			'jumlah'=>$this->input->post('jumlah'),
  			'subTotal'=>$subtotal
      );
  		$this->Booking->insertCart($data);
    }else{
      $jumlah  = $cekData->jumlah+$this->input->post('jumlah');
      $subtotal= $jumlah*$this->input->post('harga');
      $data = array(
        'jumlah'=>$jumlah,
  			'subTotal'=>$subtotal
      );
      $this->Booking->updateKeranjang($this->session->userdata('user_userID'),$this->input->post('id_obat'),$data);
    }


		echo $this->show_cart();
  }

  function show_cart()
	{
		$output = '';
		$no     = 0;
		$totalBayar = 0;
    $query = $this->Booking->showCart($this->session->userdata('user_userID'));
		foreach ($query as $items) {
				$no++;
				$output .='
									<tr>
									  <td hidden>'.$items->id_obat.'</td>
										<td>'.$items->nama_obat.'</td>
										<td>'.$items->harga.'</td>
										<td>'.$items->jumlah.'</td>
										<td>'.number_format($items->subTotal).'</td>
										<td><button type="button" id="'.$items->id_obat.'" class="remove_cart btn btn-danger btn-sm">Batal</button></td>
									</tr>
									';
				$totalBayar = $totalBayar + $items->subTotal;


		}
		$output .= '
								<tr>
									<th colspan="4">Total</th>
									<th colspan="2">'.'Rp'.number_format($totalBayar).'</th>
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
    $this->Booking->deleteCart($data);
    echo $this->show_cart();
  }

  public function sukses()
  {
		$this->session->set_flashdata("globalmsgsuccess", "Sukses");
    redirect(site_url('CFBooking/index'));
  }

  public function gagal()
  {
		$this->session->set_flashdata("globalmsggagal", "Gagal");
    redirect(site_url('CFBooking/index'));
  }

}
