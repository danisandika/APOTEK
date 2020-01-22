<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMPembelian extends CI_Controller {

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
    $this->load->model("Login");
    $this->load->model("Manager");
    $this->load->library("session");
    $this->load->library("pdf");
  }

  public function rPembelian()
  {
    $data['pembelian']=$this->Manager->showFilter();
    $data['graph_pembelian']=$this->Manager->graph_pembelian();
    $data['title']= "Laporan";
    $this->load->view('Manager/header',$data);
    $this->load->view('Manager/Pembelian/vPembelian',$data);
    $this->load->view('Manager/footer',$data);
  }

  public function cpdf($ar){
    $this->create_pdf($ar);
    redirect(site_url('CMPembelian/rPembelian'));
  }


  public function create_pdf($filter_pembelian)
  {
    $pembelian = unserialize(base64_decode($filter_pembelian));
    $output = '';
    $total = 0;
    $no=0;
    $tgl_sekarang = date('d F Y');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->setPrintFooter(false);
    $pdf->setPrintHeader(false);
    $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
    $pdf->AddPage('');
    //$pdf->Write(0, 'Laporan Mustika Farma', '', 0, 'L', true, 0, false, false, 0);
    $pdf->SetFont('');
    $pdf->SetY(30);

    $output .='<br><table>
               <tr>
                <td align="center"><h3>LAPORAN PEMBELIAN APOTEK MUSTIKA FARMA</h3></td>
               </tr>
               <tr>
                <td align="center"><h5>Jl. Sudirman No. 32 Sunter II, Jakarta Utara 14330</h5></td>
               </tr>
               <tr>
                <td align="center"><h5>Tlp. (021) 651-9555, Fax (021) 651-9821</h5></td>
               </tr>
               <tr>
                <td align="center"><h5>e-mail:mustikafarma@gmail.com</h5></td>
               </tr>
              </table>
              <br><hr><p></p>
              &nbsp;Tanggal : '.$tgl_sekarang.' <br><br>
               <table border="1" align="center">
               <tr bgcolor="#007BFF">
               <th align="center" style="width:5%"><b>No</b></th>
               <th align="center" style="width:25%"><b>ID Pembelian</b></th>
               <th align="center" style="width:25%"><b>Supplier</b></th>
               <th align="center" style="width:32%"><b>Tanggal</b></th>
               <th align="center" ><b>Sub Total</b></th>
               </tr>
              ';
      foreach ($pembelian as $items) {
			$no++;
			$output .='
								<tr>
                  <td align="center">'.$no.'</td>
								  <td align="center">'.$items->IDPembelian.'</td>
                  <td align="center">'.$items->NamaSupplier.'</td>
									<td align="left">&nbsp;'.$items->Tanggal.'</td>
									<td align="right"> Rp.'.number_format($items->totalBayar).'&nbsp;</td>
								</tr>
								';
      $total = $total+$items->totalBayar;
		}
    $output .='<tr bgcolor="#007BFF">
                <th colspan="4" align="center"><b>Total</b></th>
                <th align="right"><b>'.'Rp.'.number_format($total).'</b>&nbsp;</th>
              </tr>
              </table>';
    $pdf->writeHTML($output);
    $pdf->Output('Laporan-Pembelian-'.$tgl_sekarang.'.pdf', 'I');

  }


  public function get_pembelian_data()
  {
      $id = $this->input->get('id');
      $get_pembelian = $this->Manager->getdetail_pembelian($id);
      echo json_encode($get_pembelian);
      exit();
  }





}
