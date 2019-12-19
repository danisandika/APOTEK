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

  public function add_cart()
  {
    $data = array(
			'id'=>$this->input->post('id_obat'),
			'name'=>$this->input->post('namaobat'),
			'price'=>$this->input->post('harga'),
			'qty'=>$this->input->post('jumlah'),
			'options' => array('user_id' => $this->session->userdata('user_userID'))
    );
		$this->cart->insert($data);

		echo $this->show_cart();
  }

  function show_cart()
	{
		$output = '';
		$no     = 0;
		$totalBayar = 0;

		foreach ($this->cart->contents() as $items) {
			if ($items['options']['user_id']==$this->session->userdata('user_userID')) {
				$no++;
				$output .='
									<tr>
									  <td hidden>'.$items['id'].'</td>
										<td>'.$items['name'].'</td>
										<td>'.$items['price'].'</td>
										<td>'.$items['qty'].'</td>
										<td>'.number_format($items['subtotal']).'</td>
										<td><button type="button" id="'.$items['rowid'].'" class="remove_cart btn btn-danger btn-sm">Batal</button></td>
									</tr>
									';
				$totalBayar = $totalBayar + $items['subtotal'];
			}

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
    $data = array(
      'rowid'=>$this->input->post('row_id'),
      'qty'=>0,
    );
    $this->cart->update($data);
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