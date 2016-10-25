<?php

class Salons_m extends CI_Model{

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
        else{
          return 'False';
        }
  }

  function getSalon($id){

            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('salon','salon.userid = users.userid');
            $this->db->where('salon.SalonID',$id);
            $query = $this->db->get();
            if($query->num_rows()>0){
              $row = $query->row();
              return $row;
            }
  }

  function getStaffs($id){

    $this->db->select('*');
    $this->db->from('personnels');
    $this->db->where('salonID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }

  }

  function getServices($id){

    $this->db->select('*');
    $this->db->from('salon_services');
    $this->db->where('salonID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }

  }

  function getProducts($id){

    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('salonID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }

  }

  function getPromos($id){

    $this->db->select('*');
    $this->db->from('promos');
    $this->db->where('salonID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }

  }

  function getAnnouncements($id){
    $this->db->select('*');
    $this->db->from('announcement');
    $this->db->where('SalonID',$id);
    $query = $this->db->get();
    if($query->num_rows()>0){
      $row = $query->result();
      return $row;
    }
  }

}
