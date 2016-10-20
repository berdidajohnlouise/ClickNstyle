<?php

class Promos_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getPromos(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

      $sql2= "select * from promos where salonID = $salonid";
      $query2 = $this->db->query($sql2);

      if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
      }


    }

  }

  function getPromo($id){
    $sql = "select * from promos where promoID = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function addpromo($data){
      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();

          $salonid = $row->SalonID;

          $sql2 = "insert into promos(Photo,Name,promoDetails,price,expDate,datePosted,salonID)values(?,?,?,?,?,?,?)";
          $query2 = $this->db->query($sql2,array($data['promoimage'],$data['promoname'],$data['promodesc'],$data['price'],$data['expdate'],date('Y-m-d'),$salonid));

          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }
      }
  }

  function updatepromo($data){

    if($data['promoimage']==''){

      $this->db->set('Name',$data['promoname']);
      $this->db->set('promoDetails',$data['promodesc']);;
      $this->db->set('price',$data['price']);
      $this->db->set('expDate',$data['expdate']);
      $this->db->where('promoID',$data['promoid']);
      $query = $this->db->update('promos');

      if($query){
        return 'True';
      }

    }
    else{
      $this->db->set('Photo',$data['promoimage']);
      $this->db->set('Name',$data['promoname']);
      $this->db->set('promoDetails',$data['promodesc']);;
      $this->db->set('price',$data['price']);
      $this->db->set('expDate',$data['expdate']);
      $this->db->where('promoID',$data['promoid']);
      $query = $this->db->update('promos');

      if($query){
        return 'True';
      }
    }
  }

  function deletePromo($id){
    $this->db->where('promoID',$id);
    $query = $this->db->delete('promos');

    if($query){
      return 'True';
    }
  }

}
