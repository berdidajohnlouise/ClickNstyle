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
              $sql1 = "insert into users (username,password,email,user_image,firstname,lastname,address,usertype,created_at)values(?,?,?,?,?,?,?,?,?)";
              $query1 = $this->db->query($sql1,array($data['uname'],$data['pass'],$data['email'],$data['user_image'],$data['fname'],$data['lname'],$data['address'],$data['utype'],date('Y-m-d')));

              if($query1){

                $sql2 = "select * from users where username = ? and password = ?";
                $query2 = $this->db->query($sql2,array($data['uname'],$data['pass']));

                if($query2->num_rows()>0){
                  $row = $query2->row();
                  $session = array(
                    'userid'=>$row->userid,
                    'username'=>$row->username,
                    'usertype'=>$row->usertype,
                    'logged_in'=>1
                  );
                  $this->session->set_userdata($session);
                  return 'Login';
                }

              }

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
