<?php

class Account_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function account_details($id){

    $sql = "select * from users where userid = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
        $row = $query->row();
        return $row;
    }
  }

  function updateaccount($data){
    $this->db->set('username',$data['username']);
    $this->db->set('password',$data['password']);
    $this->db->set('email',$data['email']);
    $this->db->where('userid',$this->session->userdata('userid'));
    $query = $this->db->update('users');

    if($query){
      return 'True';
    }
    else{
      return 'False';
    }

  }

  function updateProfile($data){
    if($data['user_image'] != ""){
      $this->db->set('user_image',$data['user_image']);
      $this->db->set('firstname',$data['firstname']);
      $this->db->set('lastname',$data['lastname']);
      $this->db->set('address',$data['address']);
      $this->db->where('userid',$this->session->userdata('userid'));
      $query= $this->db->update('users');

      if($query){
        return 'True';
      }


    }
    else{
      $this->db->set('firstname',$data['firstname']);
      $this->db->set('lastname',$data['lastname']);
      $this->db->set('address',$data['address']);
      $this->db->where('userid',$this->session->userdata('userid'));
      $query = $this->db->update('users');

      if($query){
        return 'True';
      }

    }
  }

}
