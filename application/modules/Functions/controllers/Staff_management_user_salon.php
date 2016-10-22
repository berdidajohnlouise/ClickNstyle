<?php

class Staff_management_user_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Staff_management_user_salon_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      //$products = $this->Products_management_salon_m->getProducts();

      $data = array(
        'title'=>'Staff User Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,

      );

      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('staff_management_user_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function getStaffs(){

      $success = $this->Staff_management_user_salon_m->getStaffs();
      echo json_encode($success);
    }

    function getStaff($id){

      $success = $this->Staff_management_user_salon_m->getStaff($id);
      echo json_encode($success);
    }



    // function getProduct($id){
    //   $success = $this->Products_management_salon_m->getProduct($id);
    //   echo json_encode($success);
    // }
    //
    //
    // function addProduct(){
    //   $filename = 'uploadimage';
    //
    //   $path = "./assets/productsimage";
    //   chmod($path, 777);
    //   $config["upload_path"] = $path;
    //   $config["allowed_types"] = "jpg|png|jpeg|ico";
    //   $config["max_size"] = "10000";
    //   $config["max_height"] = "7680";
    //   $config["max_width"] = "10240";
    //   $this->load->library("upload", $config);
    //   $productdetails = $this->input->post();
    //
    //   if( ! $this->upload->do_upload($filename)){
    //
    //     $data = array(
    //       'productname'=>$productdetails['productname'],
    //       'productbrand'=>$productdetails['productbrand'],
    //       'price'=>$productdetails['price'],
    //       'productimage'=>'productssample.jpg'
    //     );
    //
    //     $success = $this->Products_management_salon_m->addproduct($data);
    //
    //     if($success =='True'){
    //       redirect('Functions/Products_management_salon');
    //     }
    //   }else{
    //
    //       $image = $this->upload->data();
    //
    //
    //       $data = array(
    //         'productname'=>$productdetails['productname'],
    //         'productbrand'=>$productdetails['productbrand'],
    //         'price'=>$productdetails['price'],
    //         'productimage'=>$image['file_name']
    //       );
    //
    //
    //     $success = $this->Products_management_salon_m->addproduct($data);
    //
    //     if($success =='True'){
    //       redirect('Functions/Products_management_salon');
    //     }
    //   }
    //
    // }
    //
    // function updateProduct(){
    //   $filename = 'uploadProduct';
    //
    //   $path = "./assets/productsimage";
    //   chmod($path, 777);
    //   $config["upload_path"] = $path;
    //   $config["allowed_types"] = "jpg|png|jpeg|ico";
    //   $config["max_size"] = "10000";
    //   $config["max_height"] = "7680";
    //   $config["max_width"] = "10240";
    //   $this->load->library("upload", $config);
    //   $productdetails = $this->input->post();
    //
    //   if( ! $this->upload->do_upload($filename)){
    //
    //     $data = array(
    //       'productid'=>$productdetails['productid'],
    //       'productname'=>$productdetails['productname'],
    //       'productbrand'=>$productdetails['productbrand'],
    //       'price'=>$productdetails['price'],
    //       'productimage'=>''
    //     );
    //
    //     $success = $this->Products_management_salon_m->updateproduct($data);
    //
    //     if($success =='True'){
    //       redirect('Functions/Products_management_salon');
    //     }
    //   }else{
    //
    //       $image = $this->upload->data();
    //
    //
    //       $data = array(
    //         'productid'=>$productdetails['productid'],
    //         'productname'=>$productdetails['productname'],
    //         'productbrand'=>$productdetails['productbrand'],
    //         'price'=>$productdetails['price'],
    //         'productimage'=>$image['file_name']
    //       );
    //
    //
    //     $success = $this->Products_management_salon_m->updateproduct($data);
    //
    //     if($success =='True'){
    //       redirect('Functions/Products_management_salon');
    //     }
    //   }
    // }
    //
    // function deleteProduct($id){
    //   $success = $this->Products_management_salon_m->deleteProduct($id);
    //   echo $success;
    // }
    //



}
