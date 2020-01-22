<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Model
{

  public function __construct()
  {
        parent::__construct();
  }

  public function showFilter()
  {
    $post = $this->input->post();
    $bulan = 0;
    $tahun = 0;

    //Untuk cek apakah select bulan dan tahun ada isinya atau enggak
    if(isset($post["bulan"])){
      $bulan = $post["bulan"];
      if($bulan>0 && $bulan<10){
        $bulan = "0".$bulan;
      }
    }

    if (isset($post["tahun"])) {
      // code...
      $tahun = $post["tahun"];
    }


    //Select Kondisi Berdasar Tahun/Bulan
    if($bulan==0 && $tahun==0){
      $this->db->select('IDPembelian,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar,NamaSupplier')
               ->from('pembelian')
               ->join('supplier','pembelian.IDSupplier=supplier.IDSupplier');
    }
    elseif ($bulan==0 && $tahun != 0) {
      // code...
      $this->db->select('IDPembelian,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar,NamaSupplier')
               ->from('pembelian')
               ->where('date_format(Tanggal,"%Y")',$tahun)
               ->join('supplier','pembelian.IDSupplier=supplier.IDSupplier');
    }
    elseif ($bulan !=0 && $tahun == 0) {
      // code...
      $this->db->select('IDPembelian,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar,NamaSupplier')
               ->from('pembelian')
               ->where('date_format(Tanggal,"%m")',$bulan)
               ->join('supplier','pembelian.IDSupplier=supplier.IDSupplier');
    }
    else{
      $this->db->select('IDPembelian,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar,NamaSupplier')
               ->from('pembelian')
               ->where('date_format(Tanggal,"%m")',$bulan)
               ->where('date_format(Tanggal,"%Y")',$tahun)
               ->join('supplier','pembelian.IDSupplier=supplier.IDSupplier');

    }
    $query = $this->db->get();
    return $query->result();
    }


    public function graph_pembelian()
    {
      $post = $this->input->post();
      if (isset($post["tahunp"])) {
        // code...
        $tahun = $post["tahunp"];
        $this->db->select('date_format(Tanggal,"%M") as bulan,sum(jumlah) as jumlah,sum(totalBayar) as total')
                 ->from('pembelian')
                 ->where('date_format(Tanggal,"%Y")',$tahun)
                 ->join('detailpembelian','pembelian.IDPembelian = detailpembelian.IDPembelian')
                 ->group_by('date_format(Tanggal,"%m")');
      }else{
        $this->db->select('date_format(Tanggal,"%M") as bulan,sum(jumlah) as jumlah,sum(totalBayar) as total')
                 ->from('pembelian')
                 ->join('detailpembelian','pembelian.IDPembelian = detailpembelian.IDPembelian')
                 ->group_by('date_format(Tanggal,"%m")');
      }
      $query = $this->db->get();
      return $query->result();
    }


    public function showFilterPenjualan()
    {
      $post = $this->input->post();
      $bulan = 0;
      $tahun = 0;

      //Untuk cek apakah select bulan dan tahun ada isinya atau enggak
      if(isset($post["bulan"])){
        $bulan = $post["bulan"];
        if($bulan>0 && $bulan<10){
          $bulan = "0".$bulan;
        }
      }

      if (isset($post["tahun"])) {
        // code...
        $tahun = $post["tahun"];
      }


      //Select Kondisi Berdasar Tahun/Bulan
      if($bulan==0 && $tahun==0){
        $this->db->select('IDTransaksi,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar')
                 ->from('transaksi')
                 ->where('status',0);
      }
      elseif ($bulan==0 && $tahun != 0) {
        // code...
        $this->db->select('IDTransaksi,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar')
                 ->from('transaksi')
                 ->where('status',0)
                 ->where('date_format(Tanggal,"%Y")',$tahun);
      }
      elseif ($bulan !=0 && $tahun == 0) {
        // code...
        $this->db->select('IDTransaksi,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar')
                 ->from('transaksi')
                 ->where('status',0)
                 ->where('date_format(Tanggal,"%m")',$bulan);
      }
      else{
        $this->db->select('IDTransaksi,date_format(Tanggal,"%H:%i:%s %d %M %Y") as Tanggal,totalBayar')
                 ->from('transaksi')
                 ->where('status',0)
                 ->where('date_format(Tanggal,"%m")',$bulan)
                 ->where('date_format(Tanggal,"%Y")',$tahun);

      }
      $query = $this->db->get();
      return $query->result();
      }

      public function graph_penjualan()
      {
        $post = $this->input->post();
        if (isset($post["tahunp"])) {
          // code...
          $tahun = $post["tahunp"];
          $this->db->select('date_format(Tanggal,"%M") as bulan,sum(jumlah) as jumlah,sum(totalBayar) as total')
                   ->from('transaksi')
                   ->where('date_format(Tanggal,"%Y")',$tahun)
                   ->where('status',0)
                   ->join('detailtransaksi','transaksi.IDTransaksi = detailtransaksi.IDTransaksi')
                   ->group_by('date_format(Tanggal,"%m")');
        }else{
          $this->db->select('date_format(Tanggal,"%M") as bulan,sum(jumlah) as jumlah,sum(totalBayar) as total')
                   ->from('transaksi')
                   ->where('status',0)
                   ->join('detailtransaksi','transaksi.IDTransaksi = detailtransaksi.IDTransaksi')
                   ->group_by('date_format(Tanggal,"%m")');
        }
        $query = $this->db->get();
        return $query->result();
      }

    public function graphtop3obat($tahun)
    {
      $post = $this->input->post();
      if (isset($post["tahunp"])) {
        // code...
        $tahun = $post["tahunp"];
      }
        $this->db->select('sum(jumlah) as jmlobat,namaObat,date_format(Tanggal,"%Y") as tgl')
                 ->from('detailtransaksi')
                 ->where('transaksi.status',0)
                 ->where('date_format(Tanggal,"%Y")',$tahun)
                 ->join('obat','detailtransaksi.IDObat=obat.IDObat')
                 ->join('transaksi','transaksi.IDTransaksi = detailtransaksi.IDTransaksi')
                 ->group_by('detailtransaksi.IDObat')
                 ->order_by('jmlobat','desc')
                 ->limit(3);
      $query = $this->db->get();
      return $query->result();
    }

    public function getdetail_pembelian($id)
    {
      $this->db->select('jumlah,FORMAT(subTotal,0) as subTotal,obat.namaObat')
               ->from('detailpembelian')
               ->where('detailpembelian.status',0)
               ->where('detailpembelian.IDPembelian',$id)
               ->join('obat','detailpembelian.IDObat = obat.IDObat');
      $query = $this->db->get();
      return $query->result();
    }

    public function getdetail_penjualan($id)
    {
      $this->db->select('jumlah,FORMAT(subTotal,0) as subTotal,obat.namaObat')
               ->from('detailtransaksi')
               ->where('transaksi.status',0)
               ->where('detailtransaksi.IDTransaksi',$id)
               ->join('obat','detailtransaksi.IDObat = obat.IDObat')
               ->join('transaksi','detailtransaksi.IDTransaksi = transaksi.IDTransaksi');
      $query = $this->db->get();
      return $query->result();
    }

}
?>
