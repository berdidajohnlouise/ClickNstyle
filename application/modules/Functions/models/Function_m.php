<?php

class Function_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function staff_sidebar($salonid){
    $sql = "select * from salon where SalonID = $salonid";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();

      $userid = $row->userid;

      $sql2 = "select * from users where userid = $userid";
      $query2 = $this->db->query($sql2);

        if($query2->num_rows()>0){


          $row2 = $query2->row();

          $usertype = $row2->usertype;



              if($usertype == 1 || $usertype == '1'){
                $sql = "select * from tbl_menu where menu_status = 0 or menu_status = 1";
                $query = $this->db->query($sql);

                if($query->num_rows()>0){
                  $row = $query->result();
                  return $row;
                }
                else{
                  return 'false';
                }

              }
              else if($usertype == 0 || $usertype == '0'){
                $sql = "select * from tbl_menu where menu_status = 4";
                $query = $this->db->query($sql);

                if($query->num_rows()>0){
                  $row = $query->result();
                  return $row;
                }
                else{
                  return 'false';
                }
              }
              else if($usertype == 2 || $usertype == '2'){
                $sql = "select * from tbl_menu where menu_status = 1 or menu_status = 3";
                $query = $this->db->query($sql);

                if($query->num_rows()>0){
                  $row = $query->result();
                  return $row;
                }
                else{
                  return 'false';
                }
              }

        }//query2

    }//query1
  }


  function userdetails($userid){

    $this->db->select('*');
    $this->db->from('staff_users');
    $this->db->join('personnels','personnels.staffID = staff_users.personnel_id');
    $this->db->join('salon','salon.SalonID = staff_users.SalonID');
    $this->db->where('staff_users.suID',$userid);
    $query = $this->db->get();


    if($query->num_rows()>0){
      $row = $query->row();

      return $row;
    }
  }

}
