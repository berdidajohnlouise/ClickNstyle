<?php

class Calendar_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Calendar_management_salon_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      $calendars = $this->Calendar_management_salon_m->getCalendars();

      $data = array(
        'title'=>'Calendar Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'calendars'=>$calendars
      );

      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('calendar_management_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function getCalendar($id){
      $success = $this->Calendar_management_salon_m->getCalendar($id);
      echo json_encode($success);
    }


    function getAllCalendars($id){
      $success = $this->Calendar_management_salon_m->getAllCalendars($id);
      echo json_encode($success);
    }


    function addCalendar(){

      $details = $this->input->post();

        $data = array(
          'caltitle'=>$details['caltitle'],
          'caldesc'=>$details['caldesc'],
          'caldate'=>$details['caldate']
        );

        $success = $this->Calendar_management_salon_m->addcalendar($data);

        if($success =='True'){
          redirect('Functions/Calendar_management_salon');
        }


    }

    function updateCalendar(){
      $details = $this->input->post();

        $data = array(
          'calid'=>$details['calid'],
          'caltitle'=>$details['caltitle'],
          'caldesc'=>$details['caldesc'],
          'caldate'=>$details['caldate']
        );


        $success = $this->Calendar_management_salon_m->updatecalendar($data);

        if($success =='True'){
          redirect('Functions/Calendar_management_salon');
        }

    }

    function deleteCalendar($id){
      $success = $this->Calendar_management_salon_m->deleteCalendar($id);
      echo $success;
    }




}
