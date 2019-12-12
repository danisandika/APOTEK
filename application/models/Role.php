<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model
{
  private $_table = "Role";


  public function __construct()
  {
        parent::__construct();
  }

  public function getAll()
  {
    //return $this->db->get($this->_table)->result();
    return $this->db->get_where($this->_table)->result();
  }


  public function getByID($id)
  {
    return $this->db->get_where($this->_table,["IDRole"=>$id])->row();
  }

  public function save()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
	  $this->Deskripsi = $post["Deskripsi"];
    $this->status = 1;
    $this->createby = $this->session->userdata('user_userID');
    $this->createDate = $dateNow;
		return $this->db->insert($this->_table,$this);
  }

  public function update()
  {
    $dateNow = date("Y-m-d H:i:s");
    $post = $this->input->post();
    $this->IDRole = $post["IDRole"];
    $this->Deskripsi = $post["Deskripsi"];
    //$this->status = $post["status"];
    $this->modifiedby = $this->session->userdata('user_userID');
    $this->modifiedDate = $dateNow;
		return $this->db->update($this->_table,$this,array('IDRole'=>$post['IDRole']));
  }

  public function delete($IDRole)
  {
    if($this->session->userdata('user_roleID') == $IDRole)
    {
      echo "<script type='text/javascript'>alert('Maaf Data Tidak Dapat Dihapus');</script>";
      return redirect(site_url('CRole/index'));
    }
    else {
      $this->status = 0;
      $this->modifiedBy = $this->session->userdata('user_userID');
      $this->modifiedDate = date("Y-m-d H:i:s");
      return $this->db->update($this->_table,$this,array('IDRole'=>$IDRole));
    }
  }

  public function active($IDRole)
  {
    $post = $this->input->post();
    $this->status = 1;
    $this->modifiedBy = $this->session->userdata('user_userID');
    $this->modifiedDate = date("Y-m-d H:i:s");
    return $this->db->update($this->_table,$this,array('IDRole'=>$IDRole));
  }

}
