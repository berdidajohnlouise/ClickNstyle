<?php

class Services_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getServices(){

    $this->db->select('*');
    $this->db->from('salon');
    $this->db->join('salon_services','salon_services.salonID = salon.SalonID');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
