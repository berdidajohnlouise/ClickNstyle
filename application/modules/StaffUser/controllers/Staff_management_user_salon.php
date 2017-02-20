<?php

class Staff_management_user_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Staff_management_user_salon_m');
      $this->load->model('Function_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      
      $usersdetails = $this->Function_m->userdetails($this->session->userdata('staffid'));
      $staffuser = $this->Staff_management_user_salon_m->getStaffuser();
      $data = array(
        'title'=>'Staff User Management',
        // 'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'staffs'=>$staffuser

      );

      $this->load->view('Default/staffheader',$data);
      $this->load->view('Default/staffsidebar',$data);
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



    function getStaffUser($id){
      $success = $this->Staff_management_user_salon_m->getStaffAccount($id);
      echo json_encode($success);
    }


    function addStaffUser(){

      $staffdetails = $this->input->post('data');
        $data = array(
          'staffid'=>$staffdetails['staffsid'],
          'username'=>$staffdetails['username'],
          'password'=>md5($staffdetails['password'])
        );

        $success = $this->Staff_management_user_salon_m->addStaffUser($data);

        echo $success;


    }

    function updateSU(){
      $staffdetails = $this->input->post();
        $data = array(
          'suid'=>$staffdetails['suid'],
          'username'=>$staffdetails['username'],
          'password'=>md5($staffdetails['password'])
        );

        $success = $this->Staff_management_user_salon_m->updateSU($data);
        if($success =='True'){
          redirect('StaffUser/Staff_management_user_salon');
        }
    }

    function deleteSU($id){
      $success = $this->Staff_management_user_salon_m->deleteSU($id);
      echo $success;
    }




}
