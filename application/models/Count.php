<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count extends CI_Model
{

  public function __construct()
  {
        parent::__construct();
  }

  public function getcountbk($id)
  {

    $this->db->from($id);
    $this->db->where('statusBooking !=',0);
    $this->db->where('statusBooking !=',3);
    $this->db->where('statusBooking !=',4);
    return $this->db->count_all_results();
  }

  public function getcount($id)
  {

    $this->db->from($id);
    return $this->db->count_all_results();
  }

  public function getcountJumlahObat()
  {
    $this->db->where('JumlahObat <=',10);
    $this->db->from('Obat');
    return $this->db->count_all_results();
  }

  public function getcountExpired()
  {
    $this->db->where('date(Expired) < now()');
    $this->db->from('Obat');
    return $this->db->count_all_results();
  }

  public function getcount_booking()
  {
    $this->db->where('statusBooking',1);
    $this->db->or_where('statusBooking',2);
    $this->db->from('Booking');
    return $this->db->count_all_results();
  }

  public function getcount_keranjang($user)
  {
    $this->db->where('id_user',$user);
    $this->db->from('keranjang');
    return $this->db->count_all_results();
  }

}
?>
