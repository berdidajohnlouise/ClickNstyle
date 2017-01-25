<?php

	class Reservation_m extends CI_Model{


		function __construct(){
			parent::__construct();

		}


		

		function addReservation($data){

			$sql = "insert into reservations (custID,serviceID,timeReserved,eos,dateReserved,staffID,salonID) values (?,?,?,?,?,?,?)";
			$query = $this->db->query($sql,array($data['cust_userid'],$data['salonservices'],$data['reservationhours'],$data['eos'],$data['calendar_date'],$data['serviceStaff'],$data['salonid']));


			if($query->num_rows()>0){
				return 'Service successfully reserved';
			}
		}

	}


?>