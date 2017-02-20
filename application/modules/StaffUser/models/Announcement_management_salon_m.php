<?php

class Announcement_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getAnnouncements(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

      $sql2= "select * from announcement where SalonID = $salonid ORDER BY ann_date ASC";
      $query2 = $this->db->query($sql2);

      if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
      }


    }

  }

  function getAnnouncement($id){
    $sql = "select * from announcement where ann_id = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function addannouncement($data){

      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();
          $salonid = $row->SalonID;
          $sql2 = "insert into announcement(SalonID,ann_name,ann_description,ann_date)values(?,?,?,?)";
          $query2 = $this->db->query($sql2,array($salonid,$data['ann_title'],$data['ann_desc'],date('Y-m-d')));

          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }

      }
  }

  function updateannouncement($data){

      $this->db->set('ann_name',$data['ann_title']);
      $this->db->set('ann_description',$data['ann_desc']);
      $this->db->set('ann_date',date('Y-m-d'));
      $this->db->where('ann_id',$data['ann_id']);
      $query = $this->db->update('announcement');

      if($query){
        return 'True';
      }

  }

  function deleteAnnouncement($id){
    $this->db->where('ann_id',$id);
    $query = $this->db->delete('announcement');

    if($query){
      return 'True';
    }
  }

}
