<?php

class Functions extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Function_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
      }


    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));


      $data = array(
        'title'=>'Dashboard',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails
      );
      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('dashboard',$data);
      $this->load->view('Default/adminfooter');
    }


    function staff_user(){
        $sidebar = $this->Function_m->staff_sidebar($this->session->userdata('salonid'));
        $usersdetails = $this->Function_m->userdetails($this->session->userdata('userid'));
        $data = array(
          'title'=>'Dashboard',
          'sidebar'=>$sidebar,
          'userdetails'=>$usersdetails
        );
        $this->load->view('Default/staffheader',$data);
         $this->load->view('Default/staffsidebar',$data);
        // $this->load->view('dashboard',$data);
        $this->load->view('Default/adminfooter');
    }

}
