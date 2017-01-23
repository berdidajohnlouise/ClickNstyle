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

  $sql = "select service_type from salon_services where serviceID = $serviceID";
  $query = $this->db->query($sql);

  if($query->num_rows()>0){
    $row = $query->row();
   
    if($row->service_type == 'Hair'){
      $sql1 = "select * from personnels where jobdescription = 'Barber' OR jobdescription = 'Colorist'  OR jobdescription = 'Hair Stylist' OR 'Shampoo Technician'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()>0){
        $rows = $query1->result();

        return $rows;
      }
    }
    else if($row->service_type == 'Manicure' || $row == 'Pedicure'){
      $sql1 = "select * from personnels where jobdescription = 'Nail Technician'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()>0){
        $rows = $query1->result();
        return $rows;
      }

    }
    else if($row->service_type == 'Makeup'){
      $sql1 = "select * from personnels where jobdescription = 'Esthetician' OR jobdescription = 'Makeup Artist'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()>0){
        $rows = $query1->result();
        return $rows;
      }

    }
    else if($row->service_type == 'Facial'){
      $sql1 = "select * from personnels where jobdescription = 'Esthetician' OR jobdescription = 'Makeup Artist'";
      $query1 = $this->db->query($sql1);

      if($query1->num_rows()>0){
        $rows = $query1->result();
        return $rows;
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

function getServiceDuration($serviceID){

  $sql = "select duration from salon_services where serviceID = $serviceID";
  $query = $this->db->query($sql);
    if($query->num_rows()>0){

      $row = $query->row();
      return $row;

    }

}



}
