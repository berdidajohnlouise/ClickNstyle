<?php

	class Reservation extends MY_Controller{

	function __construct(){

      parent::__construct();
      
      $this->load->model('Reservation_m');

    }


   function addreservation(){

   		   $data = $this->input->post('data');
         $duration = $data['duration'];
         $arr = explode(".", $duration);

         try {
            
            if(isset($arr[1])){

            
                 if ($duration == '0.5'){
                     $eos = $data['hours'] + 1; 
                 }
                 else if($duration == '1'){
                     $eos = $data['hours'] + 1;
                 }
                 else if((int)$arr[0]> 1 && (int)$arr[1] == 5){
                     $eos = $data['hours'] + (int)$arr[0] + 1;
                 }
                 else if((int)$arr[0]>1){
                     $eos = $data['hours'] + $duration;
                 } 
                 else{
                     $eos = $data['hours'] + $duration;
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

                 

                  
            }
            else{
               

                 if ($duration == '0.5'){
                     $eos = $data['hours'] + 1;
                 }
                 else if($duration == '1'){
                     $eos = $data['hours'] + 1;
                 }
                 else if((int)$arr[0]> 1 && (int)$arr[1] == 5){
                     $eos = $data['hours'] + (int)$arr[0] + 1;
                 }
                 else if((int)$arr[0]>1){
                     $eos = $data['hours'] + $duration;
                 } 
                 else{
                     $eos = $data['hours'] + $duration;
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

                   

            }
              
          } catch (Exception $e) {
            echo $e->getMessage();
          }

         
   }


}
?>
