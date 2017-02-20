<?php

class Products_management extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_sidebars');
    $this->load->model('Account_management_m');
    $this->load->model('Products_management_m');
    if(!$this->session->userdata('userid')){
          redirect('Web');
      }
  }

  function index(){

          $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
          $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
          $products = $this->Products_management_m->getProducts();

          $data = array(
            'title'=>'Products Management',
            'sidebar'=>$sidebar,
            'userdetails'=>$usersdetails,
            'products'=>$products
          );
          $this->load->view('Default/adminheader',$data);
          $this->load->view('Default/adminsidebar',$data);
          $this->load->view('products_management',$data);
          $this->load->view('Default/adminfooter');
  }


}
