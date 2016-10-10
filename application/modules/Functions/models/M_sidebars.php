<?php

class M_sidebars extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function sidebars(){


      $sql = "select * from tbl_menu where menu_status = 0";
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
