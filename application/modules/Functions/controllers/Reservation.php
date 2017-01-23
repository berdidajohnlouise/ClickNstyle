<?php

	class Reservation extends MY_Controller{

	function __construct(){

      parent::__construct();
      
      $this->load->model('Reservation_m');

    }


   function addreservation(){

   		$data = $this->input->post();

   		$details = array(
            'cust_userid'=>$this->session->userdata('userid'),
            'salonid'=>$data['SalonID'],
   			'salonservices'=>$data['salonservices'],
   			'serviceStaff'=>$data['serviceStaff'],
   			'calendar_date'=>$data['calendar_date'],
   			'reservationhours'=>$data['reservationhours'].':00:00'
   			);

   		
         $success = $this->Reservation_m->addReservation($details);

   }


}
?>
