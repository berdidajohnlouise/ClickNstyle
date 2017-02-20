<?php

class Staff_management extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_sidebars');
    $this->load->model('Account_management_m');
    $this->load->model('Staff_management_admin_m');
    if(!$this->session->userdata('userid')){
          redirect('Web');
      }
  }

  function index(){

          $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
          $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
          $staffs = $this->Staff_management_admin_m->getStaffs();

          $data = array(
            'title'=>'Staffs Management',
            'sidebar'=>$sidebar,
            'userdetails'=>$usersdetails,
            'staffs'=>$staffs
          );
          $this->load->view('Default/adminheader',$data);
          $this->load->view('Default/adminsidebar',$data);
          $this->load->view('staff_management_admin',$data);
          $this->load->view('Default/adminfooter');
  }


}
