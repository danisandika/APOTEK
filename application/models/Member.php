<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model
{
  private $_table = "user";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    $this->db->select('u.*,r.Deskripsi')
             ->from('user u')
             ->where('r.Deskripsi','User')
             ->join('Role r','r.IDRole=u.IDRole');
   $query = $this->db->get();
   return $query->result();
    //return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDUser"=>$id])->row();
  }

}
