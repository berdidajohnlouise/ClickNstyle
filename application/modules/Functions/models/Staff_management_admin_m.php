<?php

class Staff_management_admin_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getstaffs(){

    $this->db->select('*');
    $this->db->from('salon');
    $this->db->join('personnels','personnels.salonID = salon.SalonID');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
