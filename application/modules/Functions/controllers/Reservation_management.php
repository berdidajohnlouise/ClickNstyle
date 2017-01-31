<?php

  class Reservation_management extends MY_Controller{

    function __construct(){

      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Reservation_m');
      if(!$this->session->userdata('userid')){
        redurect('Web');
      }
    }


    function index(){
      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      $reservation = $this->Reservation_m->getUserReservation($this->session->userdata('userid'));
      //echo json_encode($reservation);

      $data = array(
        'title'=>'Reservation Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'reservation'=>$reservation
      );

      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('reservation_management',$data);
      $this->load->view('Default/adminfooter');

    }


    function clearReservation($id){
      $success = $this->Reservation_m->clearReservation($id);

      if ($success) {
        echo $success;
      }
     
    }

  }


?>
