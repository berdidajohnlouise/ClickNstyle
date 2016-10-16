<?php

class M_sidebars extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function sidebars($usertype){

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


    }



}
