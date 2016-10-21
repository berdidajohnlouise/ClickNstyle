<?php

class Promos_management extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_sidebars');
    $this->load->model('Account_management_m');
    $this->load->model('Promos_management_m');
    if(!$this->session->userdata('userid')){
          redirect('Web');
      }
  }

  function index(){

          $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
          $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
          $promos = $this->Promos_management_m->getPromos();

          $data = array(
            'title'=>'Promos Management',
            'sidebar'=>$sidebar,
            'userdetails'=>$usersdetails,
            'promos'=>$promos
          );
          $this->load->view('Default/adminheader',$data);
          $this->load->view('Default/adminsidebar',$data);
          $this->load->view('promos_management',$data);
          $this->load->view('Default/adminfooter');
  }


}
