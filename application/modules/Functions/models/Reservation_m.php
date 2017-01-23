<?php

	class Reservation_m extends CI_Model{


		function __construct(){
			parent::__construct();

		}


		

		function addReservation($data){

			$sql = "insert into reservations (custID,serviceID,timeReserved,dateReserved,staffID,salonID) values (?,?,?,?,?,?)";
			$query = $this->db->query($sql,array($data['cust_userid'],$data['salonservices'],$data['reservationhours'],$data['calendar_date'],$data['serviceStaff'],$data['salonid']));


			
		}

	}


?>