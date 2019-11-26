<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model
{
  private $_table = "user";
  private $__table = "role";

  public function __construct()
  {
        parent::__construct();
  }

  public function getByUsernamePassword()
  {
    $post1 = $this->input->post();
    $username=$post1["username"];
    $password=$post1["pass"];
    $array = array('username' => $username,'password'=> $password );
    $query = $this->db->get_where($this->_table,$array);
    return $query->row();

  }
  
  public function save()
  {
    $post = $this->input->post();
		$this->username = $post["Username"];
		$this->password = $post["Password"];
		$this->IDUser = $post["IDUser"];	
		$this->status = 1;
		return $this->db->insert($this->_table,$this);
  }

  

  public function getRoleID($IDRole)
  {
    return $this->db->get_where($this->__table,["IDRole"=>$IDRole])->row();
  }


}
