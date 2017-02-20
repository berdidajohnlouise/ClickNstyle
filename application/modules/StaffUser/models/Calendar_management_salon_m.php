<?php

class Calendar_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getCalendars(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

      $sql2= "select * from calendar where SalonID = $salonid ORDER BY cal_date ASC";
      $query2 = $this->db->query($sql2);

      if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
      }


    }

  }

  function getAllCalendars($id){

          $sql2= "select * from calendar where SalonID = $id ORDER BY cal_date ASC";
          $query2 = $this->db->query($sql2);

          if($query2->num_rows()>0){
              $result = $query2->result();
              return $result;
          }

  }

  function getCalendar($id){
    $sql = "select * from calendar where cal_id = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }



  function addcalendar($data){

      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();
          $salonid = $row->SalonID;
          $sql2 = "insert into calendar(SalonID,cal_name,cal_description,cal_date)values(?,?,?,?)";
          $query2 = $this->db->query($sql2,array($salonid,$data['caltitle'],$data['caldesc'],$data['caldate']));

          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }

      }
  }

  function updatecalendar($data){

      $this->db->set('cal_name',$data['caltitle']);
      $this->db->set('cal_description',$data['caldesc']);
      $this->db->set('cal_date',$data['caldate']);
      $this->db->where('cal_id',$data['calid']);
      $query = $this->db->update('calendar');

      if($query){
        return 'True';
      }

  }

  function deleteCalendar($id){
    $this->db->where('cal_id',$id);
    $query = $this->db->delete('calendar');

    if($query){
      return 'True';
    }
  }

}
