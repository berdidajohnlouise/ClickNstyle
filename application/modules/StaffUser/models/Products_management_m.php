<?php

class Products_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getProducts(){

    $this->db->select('*');
    $this->db->from('salon');
    $this->db->join('products','products.SalonID = salon.SalonID');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
