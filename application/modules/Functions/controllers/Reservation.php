<?php

	class Reservation extends MY_Controller{

	function __construct(){

      parent::__construct();
      
      $this->load->model('Reservation_m');

    }


   function addreservation(){

   		$data = $this->input->post('data');
         $duration = $data['duration'];

         if ($data['hours'] != '0.5' ){

             $eos = $data['hours'] + 1;
         }
         else{
             $eos = $data['hours']+ $duration;
         }

   		$details = array(
            'cust_userid'=>$this->session->userdata('userid'),
            'salonid'=>$data['salonid'],
   			'salonservices'=>$data['service'],
   			'serviceStaff'=>$data['staff'],
   			'calendar_date'=>$data['date'],
            'eos'=> $eos.':00:00',
   			'reservationhours'=>$data['hours'].':00:00'
   			);

   	
         $success = $this->Reservation_m->addReservation($details);

         if($success){
            echo 'Service successfully reserved';
         }

   }


}
?>
