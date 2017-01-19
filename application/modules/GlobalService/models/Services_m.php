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


  function getSalonServices($salonid){

  $sql = "Select * from salon_services where salonID = $salonid";
  $query = $this->db->query($sql);

  if($query->num_rows()>0){
    $row = $query->result();
    return $row;
  }

}


function getStaffService($serviceID){

  $sql = "select servicename from salon_services where serviceID = $serviceID";
  $query = $this->db->query($sql);

  if($query->num_rows()>0){
    $row = $this->db->result();

    if($row == 'Hair'){
      $sql1 = "select * from personnels where jobdescription = 'Barber' OR jobdescription = 'Colorist'  OR jobdescription = 'Hair Stylist' OR 'Shampoo Technician'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()0){
        $row = $this->db->result();
      }
    }
    else if($row == 'Manicure' || $row == 'Pedicure'){
      $sql1 = "select * from personnels where jobdescription = 'Nail Technician'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()0){
        $row = $this->db->result();
      }

    }
    else if($row == 'Makeup'){
      $sql1 = "select * from personnels where jobdescription = 'Esthetician' OR jobdescription = 'Makeup Artist'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()0){
        $row = $this->db->result();
      }

    }
  }

  // $sql = "select * from personnels";
  // $query = $this->db->query($sql);
  //
  // if($query->num_rows()>0){
  //   $row = $query->result();
  //   return $row;
  // }

}

function getStaffById($staffid){
    $sql = "Select * from personnels where staffID = $staffid";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;

    }
}



}
