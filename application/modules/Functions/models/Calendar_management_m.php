<?php

class Calendar_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getCalendars(){

    $this->db->select('*');
    $this->db->from('salon');
    $this->db->join('calendar','calendar.SalonID = salon.SalonID');

    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
