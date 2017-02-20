<?php

class Staff_management_user_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  // function getProducts(){
  //   $userid = $this->session->userdata('userid');
  //   $sql = "select * from salon where userid = $userid ";
  //   $query = $this->db->query($sql);
  //
  //   if($query->num_rows()>0){
  //     $row = $query->row();
  //     $salonid = $row->SalonID;
  //
  //     $sql2= "select * from products where SalonID = $salonid ORDER BY pro_name ASC";
  //     $query2 = $this->db->query($sql2);
  //
  //     if($query2->num_rows()>0){
  //         $result = $query2->result();
  //         return $result;
  //     }
  //
  //
  //
  //   }
  //
  // }

  function getStaffs(){

    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid";
    $query = $this->db->query($sql);

    if($query ->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;
      $sql2 = "select * from personnels where salonID = $salonid ";
      $query2 = $this->db->query($sql2);

        if($query2->num_rows()>0){
          $row = $query2->result();
          return $row;

        }

      }


}

  function getStaffuser(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid";
    $query = $this->db->query($sql);

    if($query ->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

        $this->db->select('*');
        $this->db->from('staff_users');
        $this->db->join('personnels','personnels.staffID = staff_users.personnel_id');
        $this->db->where('staff_users.salonID',$salonid);
        $query2 = $this->db->get();

        if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
        }
    }

  }

  function getStaff($id){

    $sql = "select * from personnels where staffID = $id ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;

    }

  }



  function getStaffAccount($id){

    $this->db->select('*');
    $this->db->from('staff_users');
    $this->db->join('personnels','personnels.staffID = staff_users.personnel_id');
    $this->db->where('suID',$id);
    $query = $this->db->get();

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function addStaffUser($data){

      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();
          $salonid = $row->SalonID;
          $sql2 = "insert into staff_users(userName,password,salonID,personnel_id)values(?,?,?,?)";
          $query2 = $this->db->query($sql2,array($data['username'],$data['password'],$salonid,$data['staffid']));
          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }
      }
  }

  function updateSU($data){

      $this->db->set('userName',$data['username']);;
      $this->db->set('password',$data['password']);
      $this->db->where('suID',$data['suid']);
      $query = $this->db->update('staff_users');

      if($query){
        return 'True';
      }

  }

  function deleteSU($id){
    $this->db->where('suID',$id);
    $query = $this->db->delete('staff_users');

    if($query){
      return 'True';
    }
  }

}
