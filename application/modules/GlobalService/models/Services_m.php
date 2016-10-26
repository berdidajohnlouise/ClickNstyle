<?php

class Services_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getService($id){


    $this->db->select('*');
    $this->db->from('salon_services');
    $this->db->join('salon','salon.SalonID = salon_services.salonID');
    $this->db->join('users','users.userid = salon.userid');
    $this->db->where('serviceID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function getServices($id){

    $this->db->select('*');
    $this->db->from('salon_services');
    $this->db->join('salon','salon.SalonID = salon_services.salonID');
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }

  }



}
