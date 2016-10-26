<?php

class Calendar_management_admin extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_sidebars');
    $this->load->model('Account_management_m');
    $this->load->model('Calendar_management_m');
    if(!$this->session->userdata('userid')){
          redirect('Web');
      }
  }

  function index(){

          $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
          $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
          $calendars = $this->Calendar_management_m->getCalendars();

          $data = array(
            'title'=>'Calendar Management',
            'sidebar'=>$sidebar,
            'userdetails'=>$usersdetails,
            'calendars'=>$calendars
          );
          $this->load->view('Default/adminheader',$data);
          $this->load->view('Default/adminsidebar',$data);
          $this->load->view('calendar_management_admin',$data);
          $this->load->view('Default/adminfooter');
  }


}
