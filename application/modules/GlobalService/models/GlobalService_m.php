<?php

class GlobalService_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getSalons(){

    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('salon','salon.userid = users.userid');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
