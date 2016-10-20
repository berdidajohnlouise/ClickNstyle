<?php

class Promos_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getPromos(){

    $this->db->select('*');
    $this->db->from('salon');
    $this->db->where('promos.expDate !=',date('Y-m-d'));
    $this->db->join('promos','promos.salonID = salon.SalonID');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
