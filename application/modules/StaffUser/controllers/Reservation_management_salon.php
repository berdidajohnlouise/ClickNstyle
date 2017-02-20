<?php

  class Reservation_management_salon extends MY_Controller{

    function __construct(){

      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      
      $this->load->model('Function_m');
      $this->load->model('Reservation_m');
      if(!$this->session->userdata('userid')){
        redurect('Web');
      }
    }


    function index(){
      $usersdetails = $this->Function_m->userdetails($this->session->userdata('staffid'));
      $reservation = $this->Reservation_m->getSalonReservation($this->session->userdata('userid'));


      $data = array(
        'title'=>'Reservation Management',
        //'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'reservation'=>$reservation
      );

      $this->load->view('Default/staffheader',$data);
      $this->load->view('Default/staffsidebar',$data);
      $this->load->view('reservation_management_salon',$data);
      $this->load->view('Default/adminfooter');

    }


    function confirmReservation($id){
      $success = $this->Reservation_m->confirmReservation($id);

      if ($success) {
        echo $success;
      }
     
    }


    function cancelReservation($id){
      $success = $this->Reservation_m->cancelReservation($id);

      if ($success) {
        echo $success;
      }
     
    }


 

  }


?>
