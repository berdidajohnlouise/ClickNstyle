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
}
