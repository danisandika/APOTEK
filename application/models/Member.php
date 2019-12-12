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
    return $this->db->get($this->_table)->result();
  }

  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDUser"=>$id])->row();
  }

}
