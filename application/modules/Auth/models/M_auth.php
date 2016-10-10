<?php

class M_auth extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function register($data){


         $sql = "select * from users where username = ? or email = ?";
         $query = $this->db->query($sql,array($data['uname'],$data['email']));

         if($query->num_rows()>0){
             return 'Username exist ! Please Create Another One';
         }
         else{
              $sql1 = "insert into users (username,password,email,firstname,lastname,address,usertype)values(?,?,?,?,?,?,?)";
              $query = $this->db->query($sql1,array($data['uname'],$data['pass'],$data['email'],$data['fname'],$data['lname'],$data['address'],$data['utype']));
              return 'Successfully Registered';

          }

  }

  function login($data){
      $sql = "select * from users where username = ? and password = ?";
      $query = $this->db->query($sql,array($data['username'],$data['password']));
      if($query->num_rows()>0){
          $row = $query->row();
          $session = array(
            'userid'=>$row->userid,
            'username'=>$row->username,
            'usertype'=>$row->usertype,
            'logged_in'=>1
          );
          $this->session->set_userdata($session);

          return 'Login';

      }
      else{
           return 'false';

       }

  }

}




 ?>
