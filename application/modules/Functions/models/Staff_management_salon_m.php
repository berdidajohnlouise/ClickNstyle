<?php

class Staff_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function addstaffs($data){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid";
    $query = $this->db->query($sql);

    if($query ->num_rows()>0){
        $row = $query->row();

        $salonid = $row->SalonID;
        $sql2 = "insert into personnels(nickName,lastName,firstName,jobdescription,photo,dob,contactNo,status,salonID)values(?,?,?,?,?,?,?,?,?)";
        $query2 = $this->db->query($sql2,array($data['nickname'],$data['lastname'],$data['firstname'],$data['position'],$data['user_image'],$data['dob'],$data['contactnumber'],$data['status'],$salonid));

        if($query2){
          return 'True';
        }
    }

  }

  function updatestaff($data){

    if($data['user_image']==''){
      $this->db->set('nickName',$data['nickname']);
      $this->db->set('lastName',$data['lastname']);
      $this->db->set('firstName',$data['firstname']);
      $this->db->set('jobdescription',$data['position']);
      $this->db->set('dob',$data['dob']);
      $this->db->set('contactNo',$data['contactnumber']);
      $this->db->set('status',$data['status']);
      $this->db->where('staffID',$data['staffid']);
      $query = $this->db->update('personnels');

      if($query){
        return 'True';
      }

    }
    else{
      $this->db->set('nickName',$data['nickname']);
      $this->db->set('lastName',$data['lastname']);
      $this->db->set('firstName',$data['firstname']);
      $this->db->set('jobdescription',$data['position']);
      $this->db->set('photo',$data['user_image']);
      $this->db->set('dob',$data['dob']);
      $this->db->set('contactNo',$data['contactnumber']);
      $this->db->set('status',$data['status']);
      $this->db->where('staffID',$data['staffid']);
      $query = $this->db->update('personnels');

      if($query){
        return 'True';
      }
    }
  }

  function getStaffs(){

    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid";
    $query = $this->db->query($sql);

    if($query ->num_rows()>0){
        $row = $query->row();
        $salonid = $row->SalonID;

        $sql2 = "select * from personnels where salonID = ?";
        $query2 = $this->db->query($sql2,array($salonid));
        if($query2->num_rows()>0){
          $rows = $query2->result();

          return $rows;
        }
  }


  }

  function deleteStaff($id){
    $this->db->where('staffID',$id);
    $query = $this->db->delete('personnels');

    if($query){
      return 'True';
    }
  }

  function getStaff($id){
    $sql = "select * from personnels where staffID = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();

      return $row;
    }
  }

}
