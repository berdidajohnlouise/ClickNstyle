<?php

class Account_management_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function usersaccounts(){
    $sql = "select * from users where usertype = 1 or usertype = 2";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
        $results = $query->result();
        return $results;
    }
  }

  function account_details($id){

    if($this->session->userdata('usertype')==1 || $this->session->userdata('usertype')=='1' || $this->session->userdata('usertype')==0 || $this->session->userdata('usertype')=='0'){

          $sql = "select * from users where userid = ?";
          $query = $this->db->query($sql,array($id));

          if($query->num_rows()>0){
              $row = $query->row();
              return $row;
          }
     }
     else if($this->session->userdata('usertype')==2 || $this->session->userdata('usertype')=='2'){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('salon','salon.userid = users.userid');
        $this->db->where('users.userid',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
          $row = $query->row();
          return $row;
        }
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

    if($this->session->userdata('usertype')==1 || $this->session->userdata('usertype')==0){

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
    else if($this->session->userdata('usertype')==2){

      if($data['user_image'] != ""){
        $this->db->set('user_image',$data['user_image']);
        $this->db->set('address',$data['salonaddress']);
        $this->db->where('userid',$this->session->userdata('userid'));
        $query= $this->db->update('users');

        if($query){
          $this->db->set('SalonName',$data['salonname']);
          $this->db->set('ContactNum',$data['contactnumber']);
          $this->db->set('Address',$data['salonaddress']);
          $this->db->set('Longitude',$data['long']);
          $this->db->set('Latitude',$data['lat']);
          $this->db->set('OwnerName',$data['ownername']);
          $this->db->set('SalonDetails',$data['salondetails']);
          $this->db->set('open_hours',$data['openhours']);
          $this->db->set('closing_hours',$data['closehours']);
          $this->db->where('userid',$this->session->userdata('userid'));
          $query1= $this->db->update('salon');

          if($query){
            return 'True';
          }

        }


      }
      else{
        $this->db->set('address',$data['salonaddress']);
        $this->db->where('userid',$this->session->userdata('userid'));
        $query= $this->db->update('users');

        if($query){
          $this->db->set('SalonName',$data['salonname']);
          $this->db->set('ContactNum',$data['contactnumber']);
          $this->db->set('Address',$data['salonaddress']);
          $this->db->set('Longitude',$data['long']);
          $this->db->set('Latitude',$data['lat']);
          $this->db->set('OwnerName',$data['ownername']);
          $this->db->set('SalonDetails',$data['salondetails']);
          $this->db->set('open_hours',$data['openhours']);
          $this->db->set('closing_hours',$data['closehours']);
          $this->db->where('userid',$this->session->userdata('userid'));
          $query1= $this->db->update('salon');

          if($query){
            return 'True';
          }

        }

      }

    }

  }


   function updatestaffProfile($data){

      

    $sql1 = "select * from staff_users where suID = ?";
    $query1 = $this->db->query($sql1,array($this->session->userdata('staffid')));
      

      if($query1->num_rows()>0){
        $row = $query1->row();

        if($data['user_image'] != ""){
        $this->db->set('photo',$data['user_image']);
        $this->db->set('nickName',$data['nickname']);
        $this->db->set('lastName',$data['lastname']);
        $this->db->set('firstName',$data['firstname']);
        $this->db->set('contactNo',$data['contactno']);
        $this->db->where('staffID',$row->personnel_id);
        $query= $this->db->update('personnels');

        if($query){
          return 'True';
        }

      }
      else{
        $this->db->set('nickName',$data['nickname']);
        $this->db->set('lastName',$data['lastname']);
        $this->db->set('firstName',$data['firstname']);
        $this->db->set('contactNo',$data['contactno']);
        $this->db->where('staffID',$row->personnel_id);
        $query= $this->db->update('personnels');

        if($query){
          return 'True';
        }


      }
      }
        

  }


  function staffinformation($userinfo){

    $this->db->set('userName',$userinfo['username']);
    $this->db->set('password',md5($userinfo['password']));
    $this->db->where('suID',$this->session->userdata('staffid'));
    $query= $this->db->update('staff_users');

    if($query){
      return 'True';
    }

  }


}
