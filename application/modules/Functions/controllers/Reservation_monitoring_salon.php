<?php

  class Reservation_monitoring_salon extends MY_Controller{

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
      $reservation = $this->Reservation_m->getReservationMonitoring($this->session->userdata('userid'));
      //echo json_encode($reservation);

      $data = array(
        'title'=>'Reservation Monitoring',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'reservation'=>$reservation
      );

      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('reservation_monitoring_salon',$data);
      $this->load->view('Default/adminfooter');

    }


       function queryByDate($date){

        


        $success = $this->Reservation_m->queryWithDate($date);

      
        if($success){

          echo $success;

        }else{

          echo false;

        }
        //    if($success){
              
        //       $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
        //       $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
        //       $success = $this->Reservation_m->getReservationMonitoring($this->session->userdata('userid'));
        //       //echo json_encode($success);

        //       $data = array(
        //         'title'=>'Reservation Monitoring',
        //         'sidebar'=>$sidebar,
        //         'userdetails'=>$usersdetails,
        //         'reservation'=>$success
        //       );

        //       $this->load->view('Default/adminheader',$data);
        //       $this->load->view('Default/adminsidebar',$data);
        //       $this->load->view('reservation_monitoring_salon',$data);
        //       $this->load->view('Default/adminfooter');
        //   }
        //   else{
        //     redirect('Functions/Reservation_monitoring_salon');
        //   }

    }






  }


?>
