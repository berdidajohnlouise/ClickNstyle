<?php

class Products_management_salon_m extends CI_Model{

  function __construct(){
    parent::__construct();
  }


  function getProducts(){
    $userid = $this->session->userdata('userid');
    $sql = "select * from salon where userid = $userid ";
    $query = $this->db->query($sql);

    if($query->num_rows()>0){
      $row = $query->row();
      $salonid = $row->SalonID;

      $sql2= "select * from products where SalonID = $salonid ORDER BY pro_name ASC";
      $query2 = $this->db->query($sql2);

      if($query2->num_rows()>0){
          $result = $query2->result();
          return $result;
      }


    }

  }

  function getProduct($id){
    $sql = "select * from products where pro_id = ?";
    $query = $this->db->query($sql,array($id));

    if($query->num_rows()>0){
      $row = $query->row();
      return $row;
    }
  }

  function addproduct($data){

      $userid = $this->session->userdata('userid');
      $sql = "select * from salon where userid = $userid";
      $query = $this->db->query($sql);

      if($query ->num_rows()>0){
          $row = $query->row();
          $salonid = $row->SalonID;
          $sql2 = "insert into products(SalonID,pro_name,pro_brand,price,photo)values(?,?,?,?,?)";
          $query2 = $this->db->query($sql2,array($salonid,$data['productname'],$data['productbrand'],$data['price'],$data['productimage']));
          if($query2){
            return 'True';
          }
          else{
            return 'False';
          }
      }
  }

  function updateproduct($data){

    if($data['productimage']==''){

      $this->db->set('pro_name',$data['productname']);
      $this->db->set('pro_brand',$data['productbrand']);;
      $this->db->set('price',$data['price']);
      $this->db->where('pro_id',$data['productid']);
      $query = $this->db->update('products');

      if($query){
        return 'True';
      }

    }
    else{
      $this->db->set('photo',$data['productimage']);
      $this->db->set('pro_name',$data['productname']);
      $this->db->set('pro_brand',$data['productbrand']);;
      $this->db->set('price',$data['price']);
      $this->db->where('pro_id',$data['productid']);
      $query = $this->db->update('products');

      if($query){
        return 'True';
      }
    }
  }

  function deleteProduct($id){
    $this->db->where('pro_id',$id);
    $query = $this->db->delete('products');

    if($query){
      return 'True';
    }
  }

}
