<?php

class Account_management_admin extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_sidebars');
    $this->load->model('Account_management_m');
    if(!$this->session->userdata('userid')){
          redirect('Web');
      }
  }

  function index(){

          $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
          $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
          $useraccounts = $this->Account_management_m->usersaccounts();

          $data = array(
            'title'=>'User Accounts',
            'sidebar'=>$sidebar,
            'userdetails'=>$usersdetails,
            'useraccounts'=>$useraccounts
          );
          $this->load->view('Default/adminheader',$data);
          $this->load->view('Default/adminsidebar',$data);
          $this->load->view('account_management_admin',$data);
          $this->load->view('Default/adminfooter');
  }


}
