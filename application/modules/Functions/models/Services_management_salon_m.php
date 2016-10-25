<?php

class Services_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getServices(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

      $sql2= "select * from salon_services where salonID = $salonid";
      $query2 = $this->db->query($sql2);

      if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
      }


    }

  }

  function getService($id){
    $sql = "select * from salon_services where serviceID = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function addservices($data){
      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();

          $salonid = $row->SalonID;

          $sql2 = "insert into salon_services(description,servicename,service_photo,duration,service_type,price,salonID)values(?,?,?,?,?,?,?)";
          $query2 = $this->db->query($sql2,array($data['servicedesc'],$data['servicename'],$data['serviceimage'],$data['serviceduration'],$data['servicetype'],$data['price'],$salonid));

          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }
      }
  }

  function updateservices($data){

    if($data['serviceimage']==''){

      $this->db->set('servicename',$data['servicename']);
      $this->db->set('description',$data['servicedesc']);;
      $this->db->set('duration',$data['serviceduration']);
      $this->db->set('service_type',$data['servicetype']);
      $this->db->set('price',$data['price']);
      $this->db->where('serviceID',$data['serviceid']);
      $query = $this->db->update('salon_services');

      if($query){
        return 'True';
      }

    }
    else{
      $this->db->set('servicename',$data['servicename']);
      $this->db->set('description',$data['servicedesc']);;
      $this->db->set('duration',$data['serviceduration']);
      $this->db->set('price',$data['price']);
      $this->db->set('service_photo',$data['serviceimage']);
      $this->db->where('serviceID',$data['serviceid']);
      $query = $this->db->update('salon_services');

      if($query){
        return 'True';
      }
    }
  }

  function deleteService($id){
    $this->db->where('serviceID',$id);
    $query = $this->db->delete('salon_services');

    if($query){
      return 'True';
    }
  }

}
