<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Model
{
  private $_table = "userlogin";


  public function __construct()
  {
        parent::__construct();
  }

  public function getRoleID($LoginID)
  {
    $post1 = $this->input->post();
    $query = $this->db->get_where($this->_table,["IDLogin"=>$LoginID]);
    return $query->row();
  }

}