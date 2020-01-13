<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count extends CI_Model
{

  public function __construct()
  {
        parent::__construct();
  }

  public function getcount($id)
  {
    $this->db->where('statusBooking',1);
    $this->db->or_where('statusBooking',2);
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

}
?>
